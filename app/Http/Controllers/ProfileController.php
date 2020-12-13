<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function mypage(Request $request)
    {
        // セッションリセット
        $request->session()->forget(['category', 'word','comment','type','category.id']);

        $authUser = Auth::user();
        $auth =[
            'id' => $authUser['id'],
            'user' => $authUser['name']
        ];
        $user_id = $auth['id']; #ログインユーザのid
        

        $table = DB::table('words')
                    ->join('categories','words.category_id','=','categories.id')
                    ->where('words.user_id',$user_id)
                    ->select('categories.name','words.word','words.comment','words.id','categories.type')
                    ->orderByRaw('words.updated_at DESC')
                    ->get();
        $data =[
            'words' => $table
        ];
        
        return view('auth.profile.mypage',$data);
    }

    public function edit($id)
    {
        
        $authUser = Auth::user();
        $user_id = $authUser['id']; #ログインユーザのid   

        // 選択単語の情報
        $table = DB::table('words')
                    ->join('categories','words.category_id','=','categories.id')
                    ->where('words.id',$id)
                    ->get();

        // その単語が属するカテゴリID
        $categoryId = DB::table('words')
                    ->where('words.id',$id)
                    ->value('category_id');
        session(['category.id' => $categoryId]);

        $data = [
            'colums' => $table
        ];

        return view('auth.profile.edit',$data);
    }

    public function delete($id)
    {
        $authUser = Auth::user();
        $user_id = $authUser['id']; #ログインユーザのid  

        // 削除処理
        $table = DB::table('words')
                    ->join('categories','words.category_id','=','categories.id')
                    ->where([
                        ['words.id',$id ],
                        ['words.user_id',$user_id],
                    ])
                    ->select('words.*')
                    ->delete();

        return view('auth.profile.deleted');
    }
}
