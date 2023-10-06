<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //

    public function index(){
      
        $data['sum'] = 1;
        return view('admin.dashboard.index', compact('data'));
    }


}
