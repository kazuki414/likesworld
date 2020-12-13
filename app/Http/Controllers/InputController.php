<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InputController extends Controller
{
    public function top(Request $request)
    {
        // セッションリセット
        $request->session()->forget(['category', 'word','comment','type','category.id']);

        // 全てのユーザが登録したカテゴリ(好きなもの)最新15件
        $categories = DB::table('categories')
                            ->where('type',0)
                            ->orderByRaw('updated_at DESC')
                            ->limit(15)
                            ->get();

        // 全てのユーザが登録したカテゴリ（AかBか）最新15件
        $selectCategories = DB::table('categories')
                            ->where('type',1)
                            ->orderByRaw('updated_at DESC')
                            ->limit(15)
                            ->get();
        $data = [
            'categories' => $categories,
            'selectCate' => $selectCategories
        ];
        return view('auth.input.top',$data);
    }

    public function check(Request $request)
    {
        // -------------------処理に必要な値の定義-----------------------
        $category = $request->input('category');      #カテゴリ名
        $word = $request->input('word');              #登録単語
        $comment = $request->input('comment');        #ひとこと内容
        $type = $request->input('type');              #カテゴリタイプ
        $data = [
            'category' => $category,
            'word' => $word,
            'comment' => $comment,
            'type' => $type        
        ];
        // ---------------ここまで(処理に必要な値の定義)-----------------------』
        
        // ---------------セッションの設定----------------------------------
        session(['category' => $category]);
        session(['word' => $word]);
        session(['comment' => $comment]);
        session(['type' => $type]);
        // ---------------ここまで(セッションの設定)-----------------------』

        return view('auth.input.check',$data);
    }
    
    
    
    public function submit(Request $request)
    {
        // -------------------処理に必要な値の定義----------------------------
        // セッションから値を取得
        $category = $request->session()->get('category'); 
        $word = $request->session()->get('word');
        $comment = $request->session()->get('comment', 'ひとこと登録：なし');
        $type = $request->session()->get('type');

        $authUser = Auth::user();
        $auth =[
            'id' => $authUser['id'],
            'user' => $authUser['name']
        ];
        $user_id = $auth['id']; #ログインユーザのid
        
        
        // カテゴリIDの取得（未登録ならnull）
        $category_id = DB::table('categories')
        ->where('name', $category)
        ->value('id');
        
        // 選択カテゴリが新規の場合(db追加＋id取得)
        if (empty($category_id)) {
            DB::table('categories')->insert([
                'name' => $category,
                'type' => $type,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $category_id = DB::table('categories')
            ->where('name', $category)
            ->value('id');
        }
            
        // セッションにカテゴリID追加
        session(['category.id' => $category_id]);
        // -----------------ここまで(処理に必要な値の定義)----------------』
        
        
        // -------------------単語重複確認---------------------------------
        
        // ワードが同一ユーザにより登録されていないか確認(なければnull)
        $oldWord = DB::table('words')->where([
            ['user_id',$user_id],
            ['category_id',$category_id]
        ])->value('word');
            
            
        if (isset($oldWord)) {
            // -------同カテゴリに登録がある場合
            $data = [
                'oldWord' => $oldWord, 
                'word' => $word, 
                'comment' => $comment,
                'category' => $category,
                'category_id' => $category_id
            ];
            
            return view('auth.input.confirm',$data);
            
        }else{
            // -------同カテゴリに登録がない場合
            // ワードの登録
            DB::table('words')->insert([
                'word' => $word,
                'comment' => $comment,
                'user_id' => $user_id,
                'category_id' => $category_id,
                'created_at' => now(),
                'updated_at' => now()
                ]);
            //カテゴリのタイムアップデート 
            DB::table('categories')->where('id',$category_id)->update([
                'updated_at' => now()
            ]);
            $data =[
                    'word' => $word,
                    'comment' => $comment,
                    'category' => $category
                ];
                
            return view('auth.input.submit',$data);
        }
        // -------------------ここまで(単語重複確認)-----------------------』
                    
                    
    }
    
    
    public function update(Request $request)
    {
        // -------------------必要な値の定義-------------------------------
        // セッションから値を取得
        $category_id = $request->session()->get('category.id');
        $word = $request->session()->get('word');
        $comment = $request->session()->get('comment');
        
        // editページから来た場合のみ処理
        $editOn = $request->input('update'); #editページのsubmitボタンvalue
        if(isset($editOn)){
            $word = $request->input('word'); #更新する単語
            $comment = $request->input('comment'); #更新するコメント
        }
        $authUser = Auth::user();
        $auth =[
            'id' => $authUser['id'],
            'user' => $authUser['name']
        ];
        $user_id = $auth['id']; #ログインユーザのid
        
        
        // -------------------ここまで(必要な値の定義)-----------------------』
        


        // -------------------UPDATE処理----------------------------------
        
        DB::table('words')->where([
            ['category_id',$category_id],
            ['user_id',$user_id],
            ])
            ->update([
            'word' => $word,
            'comment' => $comment,
            'updated_at' => now()
        ]);
        
        DB::table('categories')->where('id',$category_id)->update([
            'updated_at' => now()
        ]);
        // -------------------ここまで(UPDATE処理)------------------------』
        return view('auth.input.update');
    }
}
            