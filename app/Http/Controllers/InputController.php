<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InputController extends Controller
{
    //
    public function top()
    {
        $categories = DB::table('categories')->get();
        $data = [
            'categories' => $categories
        ];
        return view('auth.input.top',$data);
    }

    public function check(Request $request)
    {
        $inputCategory = $request->input('category');
        $inputWord = $request->input('word');
        $comment = $request->input('comment');
        $data = [
            'category' => $inputCategory,
            'word' => $inputWord,
            'comment' => $comment,
            'type' => 0          
        ];
        //  dd($data);
        return view('auth.input.check',$data);
    }
    


    public function submit(Request $request)
    {
        // リクエストから値を取得
        $insertCategory = $request->input('category');
        $insertWord = $request->input('word');
        $checked = $request->input('checked');
        $type = $request->input('type');
        $comment = $request->input('comment');
        


        // typeがセットされていない場合
        if(empty($type)) {
            $type = 0;
        }

        // カテゴリIDの取得（未登録ならnull）
        $category_id = DB::table('categories')
        ->where('name', $insertCategory)
        ->value('id');

        // 選択カテゴリが新規の場合(db追加＋id取得)
        if (empty($category_id)) {
            DB::table('categories')->insert([
                'name' => $insertCategory,
                'type' => $type
            ]);
            $category_id = DB::table('categories')
            ->where('name', $insertCategory)
            ->value('id');
        }

        // ログインユーザに応じたuser_idの取得
        $user_id = 0;

        // ワードが同一ユーザにより登録されていないか確認
        $oldWord = DB::table('words')->where([
            ['user_id',$user_id],
            ['category_id',$category_id]
            ])->value('word');

        
        if (isset($oldWord) && empty($checked)) {
            // -------同カテゴリに登録がある場合
            $check = 1;

            $data = [
                'check' => $check,
                'oldWord' => $oldWord,
                'word' => $insertWord,
                'category' => $insertCategory,
                'comment' => $comment
            ];
        
            return view('auth.input.check',$data);
        
        }else{
            // -------同カテゴリに登録がない場合,もしくは確認済みの場合（後ほど、分離して更新工程に変更）
            // ワードの登録
            DB::table('words')->insert([
                'word' => $insertWord,
                'category_id' => $category_id,
                'user_id' => $user_id,
                'comment' => $comment
            ]);

            $data =[
                'word' => $insertWord,
                'category' => $insertCategory,
            ];
    
            return view('auth.input.submit',$data);
        }

        // return view('auth.input.submit',$data);


    }


}
