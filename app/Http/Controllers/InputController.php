<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InputController extends Controller
{
    public function top()
    {
        // 全てのユーザが登録したカテゴリ
        $categories = DB::table('categories')
                            ->orderByRaw('updated_at DESC')
                            ->get();
        $data = [
            'categories' => $categories
        ];
        return view('auth.input.top',$data);
    }

    public function check(Request $request)
    {
        // -------------------処理に必要な値の定義-----------------------
        $inputCategory = $request->input('category');
        $inputWord = $request->input('word');
        $comment = $request->input('comment');
        $type = $request->input('type');  
        $data = [
            'category' => $inputCategory,
            'word' => $inputWord,
            'comment' => $comment,
            'type' => $type        
        ];
        // ---------------ここまで(処理に必要な値の定義)-----------------------』
        return view('auth.input.check',$data);
    }
    
    
    
    public function submit(Request $request)
    {
        // -------------------処理に必要な値の定義----------------------------
        // リクエストから値を取得
        $insertCategory = $request->input('category'); #カテゴリ名
        $insertWord = $request->input('word'); #登録単語
        $type = $request->input('type'); #登録カテゴリのタイプ
        $comment = $request->input('comment'); #登録コメント
        $authUser = Auth::user();
        $auth =[
            'id' => $authUser['id'],
            'user' => $authUser['name']
        ];
        $user_id = $auth['id']; #ログインユーザのid
        
        
        // カテゴリIDの取得（未登録ならnull）
        $category_id = DB::table('categories')
        ->where('name', $insertCategory)
        ->value('id');
        
        // 選択カテゴリが新規の場合(db追加＋id取得)
        if (empty($category_id)) {
            DB::table('categories')->insert([
                'name' => $insertCategory,
                'type' => $type,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $category_id = DB::table('categories')
            ->where('name', $insertCategory)
            ->value('id');
        }
            
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
                'word' => $insertWord, 
                'comment' => $comment,
                'category' => $insertCategory,
                'category_id' => $category_id
            ];
            
            return view('auth.input.confirm',$data);
            
        }else{
            // -------同カテゴリに登録がない場合
            // ワードの登録
            DB::table('words')->insert([
                'word' => $insertWord,
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
                    'word' => $insertWord,
                    'comment' => $comment,
                    'category' => $insertCategory
                ];
                
            return view('auth.input.submit',$data);
        }
        // -------------------ここまで(単語重複確認)-----------------------』
                    
                    
    }
    
    
    public function update(Request $request)
    {
        // -------------------必要な値の定義-------------------------------
        // $insertCategory = $request->input('category');
        $Word = $request->input('word'); #更新する単語
        $comment = $request->input('comment'); #更新するコメント
        $category_id = $request->input('category_id'); #操作するカテゴリのid
        $authUser = Auth::user();
        $auth =[
            'id' => $authUser['id'],
            'user' => $authUser['name']
        ];
        $user_id = $auth['id']; #ログインユーザのid
        
        
        // -------------------ここまで(必要な値の定義)-----------------------』
        


        // -------------------UPDATE処理----------------------------------
        // dd([
        //     $category_id,
        //     $user_id,
        //     $Word,
        //     $comment
        //     ]);
        DB::table('words')->where([
            ['category_id',$category_id],
            ['user_id',$user_id],
            ])
            ->update([
            'word' => $Word,
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
            