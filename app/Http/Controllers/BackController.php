<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    use App\Http\Requests;
    use App\Http\Controllers\Controller;

    class BackController extends Controller {

        public function __construct()
        {
            $this->middleware('auth');
        }

        public function dashboard()
        {
            $title = "Dashboard";
            return view('back.dashboard', compact('title'));
        }

    }
