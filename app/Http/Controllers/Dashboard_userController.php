<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard_userController extends Controller
{
    public function index(){
        return view('user.index');
    }
    public function contack(){
        return view('user.contack');
    }

    public function about(){
        return view('user.about');
    }
}
