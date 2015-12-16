<?php

    namespace App\Http\Controllers;

    use App\User;
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
            $numberUsers = User::all()->count();


            return view('back.dashboard', compact('title', 'numberUsers'));
        }

    }
