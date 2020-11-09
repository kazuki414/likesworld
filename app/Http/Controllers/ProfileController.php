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
        $categories = DB::table('categories')->get();
        $words = DB::table('words')->get();
        $data =[
            'categories' => $categories,
            'words' => $words
        ];
        return view('auth.profile.mypage',$data);
    }
}
