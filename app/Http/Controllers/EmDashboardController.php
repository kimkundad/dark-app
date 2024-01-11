<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\lead_list;

class EmDashboardController extends Controller
{
    //
    public function index(){
      
        $sum_price_final2 = lead_list::sum('sum_price_final2');
        $data['sum_price_final2'] = $sum_price_final2;

        $crm = lead_list::where('lead_lists_channels', 4)->sum('sum_price_final2');
        $data['crm'] = $crm;

        $sum = lead_list::count();
        $data['sum'] = $sum;

        return view('admin.employee.dashboard.index', $data);
    }
}
