<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function home(){
        $title = trans('app.pages.home');
        return view('front.home', compact('title'));
    }

}
