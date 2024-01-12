<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth::check()) {

            if(Auth::user()->roles[0]['name'] == 'user'){
                return Redirect::to('admin/employee_dashboard');
            }
            if(Auth::user()->roles[0]['name'] == 'admin'){
                return Redirect::to('admin/head_dashboard');
            }
            if(Auth::user()->roles[0]['name'] == 'superadmin'){
                return Redirect::to('admin/dashboard');
            }
            
       } else {
            return view('home');
       }

    }
}
