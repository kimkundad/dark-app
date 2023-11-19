<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lead_list;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\pipeline;
use App\Models\sup_pipeline;
use App\Models\lead_main;
use App\Models\timeline_pipe;
use App\Models\follow_pipe;
use App\Models\product;
use App\Models\transport;
use App\Models\sale_contact;
use App\Models\User;
use App\Models\Tambon;
use App\Models\customer_manager;
use Response;
use Auth;

class OrderListController extends Controller
{
    //

    public function create_lead(){

        $sale_contact = sale_contact::all();
        $pipeline = pipeline::all();
        $User = User::all();
        $provinces = Tambon::select('province')->distinct()->get();
        $amphoes = Tambon::select('amphoe')->distinct()->get();
        $tambons = Tambon::select('tambon')->distinct()->get();

        return view('admin.create_lead.index', compact('sale_contact', 'pipeline', 'User', 'provinces', 'amphoes', 'tambons'));
    }

    public function add_order_list($id){

        $objs = product::all();
        $transport = transport::all();
        $lead_main = lead_main::where('id', $id)->first();

        return view('admin.crm_lead_list.order', compact('objs', 'id', 'lead_main', 'transport'));
    }

    public function post_new_lead(Request $request){    

        $this->validate($request, [
            'lead_name' => 'required',
            'fullname' => 'required',
            'phone' => 'required',
            'lead_lists_channels' => 'required',
            'pip_id' => 'required',
            'upsale_id' => 'required',
            'end_date' => 'required',
            'province' => 'required',
            'district' => 'required',
            'Subdistrict' => 'required',
            'zip_code' => 'required',
        ]);

        // dd($request->all());

        $codeuser = 'CM'.rand(11111111,99999999);

        $img_ran = '300-'.rand(1,30).'.jpg';
        $lock_avatar = 1;

           $user = new customer_manager();
           $user->fullname = $request['fullname'];
           $user->codeuser = $codeuser;
           $user->phone = $request['phone'];
           $user->phone2 = $request['phone2'];
           $user->address = $request['address'];
           $user->Subdistrict = $request['Subdistrict'];
           $user->district = $request['district'];
           $user->province = $request['province'];
           $user->zip_code = $request['zip_code'];
           $user->lock_avatar = $lock_avatar;
           $user->avatar = $img_ran;
           $user->nickname = $request['nickname'];
           $user->email = $request['email'];
           $user->channels = $request['lead_lists_channels'];
           $user->save();

           $user_id = $user->id;

           if($user_id){

                        $lead_main = new lead_main();
                        $lead_main->lead_name = $request['lead_name'];
                        $lead_main->user_id = $user_id;
                        $lead_main->pip_id = $request['pip_id'];
                        $lead_main->lead_lists_channels =$request['lead_lists_channels'];
                        $lead_main->upsale_id = $request['upsale_id'];
                        $lead_main->end_date = $request['end_date'];
                        $lead_main->save();

                        return redirect(url('admin/crm_lead_list_view/'.$lead_main->id))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

           }

    }

    public function post_new_order(Request $request, $id){

        $this->validate($request, [
            'pro_id' => 'required',
            'tran_id' => 'required',
            'lead_lists_payment_type' => 'required',
            'lead_lists_payment_status' => 'required',
            'total_sale' => 'required',
            'sum_price_final2' => 'required',
            'order_date' => 'required',
            'pay_date' => 'required',
        ]);

       $objs = lead_main::where('id', $id)->first();

       if($objs){

            $obj = new lead_list();
            $obj->user_id = $objs->user_id;
            $obj->upsale_id = $objs->upsale_id;
            $obj->pip_id = $objs->pip_id;
            $obj->lead_lists_channels = $objs->lead_lists_channels;
            $obj->pro_id = $request->pro_id;
            $obj->tran_id = $request->tran_id;
            $obj->lead_lists_payment_type = $request->lead_lists_payment_type;
            $obj->lead_lists_payment_status = $request->lead_lists_payment_status;
            $obj->total_sale = $request->total_sale;
            $obj->sum_price_final2 = $request->sum_price_final2;
            $obj->order_date = $request->order_date;
            $obj->pay_date = $request->pay_date;
            $obj->tracking_no = $request->tracking_no;
            $obj->code_lead_lists = $request->code_lead_lists;
            $obj->discount_pro = $request->discount_pro;
            $obj->note = $request->note;
            $obj->lead_main_id = $id;
            $obj->save();

       }

        return redirect(url('admin/crm_lead_list_view/'.$id))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
    }
}
