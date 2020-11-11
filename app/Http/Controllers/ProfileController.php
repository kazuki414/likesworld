<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function mypage()
    {
        // $categories = DB::table('categories')->get();
        // $words = DB::table('words')->get();
        // $data =[
        //     'categories' => $categories,
        //     'words' => $words
        // ];
        $authUser = Auth::user();
        $auth =[
            'id' => $authUser['id'],
            'user' => $authUser['name']
        ];
        $user_id = $auth['id']; #ログインユーザのid
        

        $table = DB::table('words')
                    ->join('categories','words.category_id','=','categories.id')
                    ->where('words.user_id',$user_id)
                    ->select('categories.name','words.word','words.comment')
                    ->get();
        $data =[
            'words' => $table
        ];
        // dd($data);
        return view('auth.profile.mypage',$data);
    }
}
