<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Models\customer_manager;
use App\Models\sale_contact;
use App\Models\lead_list;
use App\Models\pipeline;
use App\Models\transport;
use App\Models\User;
use App\Models\lead_main;
use App\Models\product;
use App\Models\follow_pipe;
use App\Models\sup_pipeline;
use App\Models\fileup;
use Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class LeadImportController extends Controller
{
    //

    public function lead_import(){

        $objs = fileup::select(
            'fileups.*',
            'fileups.id as id_q',
            'fileups.created_at as created_ats',
            'users.*',
            )
            ->leftjoin('users', 'users.id',  'fileups.user_id')
            ->orderby('fileups.id', 'desc')->paginate(15);

        $objs->setPath('');

        return view('admin.lead_import.index', compact('objs'));
    }

    public function del_fileup($id){

        $objs = DB::table('fileups')
            ->where('id', $id)
            ->first();

            if(isset($objs->file_name)){
              $file_path = 'import/csv/'.$objs->file_name;
               unlink($file_path);
            }

        $obj = fileup::find($id);
        $obj->delete();

        return redirect(url('admin/lead_import/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');

    }


    public function download($file)
{
    $downloadLink = Storage::disk('do_spaces')->url($file);

    // Redirect or return a response with the link
    return redirect($downloadLink);
}

public function cleanData($a) {


        $a = floatval(preg_replace('/[^\d.]/', '', $a));
   
        return $a;

}

    public function fileImport(Request $request) 
    {

            $csv = file($request->file);
            $chunks = array_chunk($csv, 1000);
            $path = resource_path('temp');
            foreach ($chunks as $key => $chunk) {
                $name = "/tmp{$key}.csv";
                file_put_contents($path . $name, $chunk);
            }

            $files = glob("$path/*.csv");
            $header = [];
            
            $num = 0;

            foreach ($files as $key => $file) {

                $data = array_map('str_getcsv', file($file));
                // if($key == 0){
                //     $header = $data[0];
                //     unset($data[0]);
                // }

                // dd($data);

                foreach ($data as $sale) {

                    if($sale[10] !== 'ยกเลิก'){

                    if(!empty(trim($sale[0]))){

                    $sup_pipeline_ch = 0;

                    //dd(date('Y-m-d', strtotime($sale[47])));

                    $product = product::where('pro_name', $sale[26])->first();
                    if($product){
                        $pro_id = $product->id;
                    }else{
                        $pro_id = 0;
                    }

                    $check_lead = lead_list::where('name_customer', $sale[4])->where('pro_id', $pro_id)->where('phone_customer', '0'.$sale[5])->where('order_datex', date('Y-m-d', strtotime($sale[47])))->first();
                    

                    $price_pro = $this->cleanData($sale[32]);
                    $discount_pro = $this->cleanData($sale[34]);
                    $sum_discount_buy_cus = $this->cleanData($sale[37]);
                    $sum_price_shipping = $this->cleanData($sale[38]);
                    $sum_price_cod = $this->cleanData($sale[39]);
                    $sum_price_final = $this->cleanData($sale[40]);
                    $sum_tax = $this->cleanData($sale[41]);
                    $sum_price_final2 = $this->cleanData($sale[42]);
                    $sum_price_pro = $this->cleanData($sale[35]);
                    $sum_order_pro = $this->cleanData($sale[36]);


                    if(!$check_lead){

                    

                        $num++;

                                $user = customer_manager::where('fullname', $sale[4])->where('phone', '0'.$sale[5])->first();
                                    
                                $sale_contact = sale_contact::where('salename', $sale[0])->first();
                                    if($sale_contact){
                                        $name_ch = $sale_contact->id;
                                    }else{
                                        $name_ch = 3;
                                    }


                                $pipeline = pipeline::where('pipe_name', $sale[30])->first();
                                if($pipeline){
                                    $pipeline_id = $pipeline->id;
                                    $sup_pipeline = sup_pipeline::where('pipe_id', $pipeline_id)->where('sort', 0)->first();
                                    $sup_pipeline_ch = 1;
                                // dd($sup_pipeline);
                                $date_xx = $sup_pipeline->day;

                                }else{
                                    $pipeline_id = 4;
                                    $date_xx = 1;
                                }

                                if($sale[9] == '-'){
                                    $sun_upsale = 0;
                                }else{

                                    $sun_upsale = (float)substr($sale[9],2);;
                                }

                                $transport = transport::where('transportname', $sale[20])->first();
                                if($transport){
                                    $tran_id = $transport->id;
                                }else{
                                    $tran_id = 7;
                                }

                                $user_name = User::where('name', $sale[46])->first();
                                if($user_name){
                                    $upsale_id = $user_name->id;
                                }else{
                                    $upsale_id = 5;
                                }

                                

                                

                                if($user){
                                    $user_id = $user->id;

                                }else{

                                    $img_ran = '300-'.rand(1,30).'.jpg';
                                    $objs = new customer_manager();
                                    $objs->fullname = $sale[4];
                                    $objs->codeuser = '0'.$sale[5];
                                    $objs->phone = '0'.$sale[5];
                                    $objs->phone2 = '0'.$sale[6];
                                    $objs->sex = 'ไม่ระบุ';
                                    $objs->type_address = 'ไม่ระบุ';
                                    $objs->address = $sale[14];
                                    $objs->Subdistrict = $sale[15];
                                    $objs->district = $sale[16];
                                    $objs->province = $sale[17];
                                    $objs->zip_code = $sale[18];
                                    $objs->county = $sale[19];
                                    $objs->lock_avatar = 1;
                                    $objs->avatar = $img_ran;
                                    $objs->status = 1;
                                    $objs->nickname = $sale[7];
                                    $objs->channels = $name_ch;
                                    $objs->save();

                                    $user_id = $objs->id;

                                
                                    // $lead_main = new lead_main();
                                    // $lead_main->lead_name = $sale[4];
                                    // $lead_main->user_id = $user_id;
                                    // $lead_main->pip_id = $pipeline_id;
                                    // $lead_main->lead_lists_channels = $name_ch;
                                    // $lead_main->upsale_id = $upsale_id;
                                    // $lead_main->end_date = date('Y-m-d', strtotime($sale[47]));
                                    // $lead_main->save();
                                    // $lead_main_id = $lead_main->id;

                                    // $lead_main_end_date = $lead_main->end_date;

                                }


                                $check_lead_main = lead_main::where('user_id', $user->id)->where('pro_id', $pro_id)->first();

                                    if($check_lead_main){
                                        $lead_main_id = $check_lead_main->id;
                                        $lead_main_end_date = $check_lead_main->end_date;
                                    }else{

                                        $lead_main2 = new lead_main();
                                        $lead_main2->lead_name = $sale[4];
                                        $lead_main2->user_id = $user_id;
                                        $lead_main2->pip_id = $pipeline_id;
                                        $lead_main2->lead_lists_channels = $name_ch;
                                        $lead_main2->upsale_id = $upsale_id;
                                        $lead_main2->pro_id = $pro_id;
                                        $lead_main2->end_date = date('Y-m-d', strtotime($sale[47]));
                                        $lead_main2->save();
                                        $lead_main_id = $lead_main2->id;

                                        $lead_main_end_date = $lead_main2->end_date;

                                    }

                                    $lead = new lead_list();
                                    $lead->user_id = $user_id;
                                    $lead->pip_id = $pipeline_id;
                                    $lead->name_customer = $sale[4];
                                    $lead->phone_customer = '0'.$sale[5];
                                    $lead->status_upsale = $sale[8];
                                    $lead->lead_lists_channels = $name_ch;
                                    $lead->type_sale_lead_lists = $sale[23];
                                    $lead->type_pro_lead_lists = $sale[28]; 
                                    $lead->code_lead_lists = $sale[2];
                                    $lead->sun_upsale = $sun_upsale;
                                    $lead->lead_lists_status_sale = $sale[10];
                                    $lead->lead_lists_payment_type = $sale[11];
                                    $lead->lead_lists_payment_status = $sale[12];
                                    $lead->tracking_no = $sale[21];
                                    $lead->tran_id = $tran_id;
                                    $lead->invoid_no = $sale[13];
                                    $lead->price_pro = $price_pro;
                                    $lead->total_sale = $sale[33];
                                    $lead->discount_pro = $discount_pro;
                                    $lead->sum_price_pro = $sum_price_pro;
                                    $lead->sum_order_pro = $sum_order_pro;
                                    $lead->sum_discount_buy_cus = $sum_discount_buy_cus;
                                    $lead->sum_price_shipping = $sum_price_shipping;
                                    $lead->sum_price_cod = $sum_price_cod;
                                    $lead->sum_price_final = $sum_price_final;
                                    $lead->sum_tax = $sum_tax;
                                    $lead->sum_price_final2 = $sum_price_final2;
                                    $lead->tag = $sale[43];
                                    $lead->note = $sale[44];
                                    $lead->sale_employee = $sale[45];
                                    $lead->upsale_name = $sale[46];
                                    $lead->order_date = $sale[47];
                                    $lead->order_datex = date('Y-m-d', strtotime($sale[47]));
                                    $lead->pay_date = $sale[48];
                                    $lead->upsale_id = $upsale_id;
                                    $lead->lead_main_id = $lead_main_id;
                                    $lead->pro_id = $pro_id;
                                    $lead->lead_lists_statusx = 1;
                                    $lead->product_name = $sale[26];
                                    $lead->sku = $sale[30];
                                    $lead->tra_name = $sale[20];
                                    $lead->save();

                        
                                    if($sup_pipeline_ch == 1){
                                        $check_lead_2 = follow_pipe::where('read_id', $lead->id)->count();
                                        if($check_lead_2 == 0){
                                            $follow_pipe = new follow_pipe();
                                            $follow_pipe->read_id = $lead->id;
                                            $follow_pipe->upsale_idx = $upsale_id;
                                            $follow_pipe->sub_pipe_id = $sup_pipeline->id;
                                            $follow_pipe->user_id_add = 1;
                                            $follow_pipe->cus_id = $user_id;
                                            $follow_pipe->date_follow = date('Y-m-d' ,strtotime($lead_main_end_date. ' + '.$date_xx.' days'));
                                            $follow_pipe->note = $sup_pipeline->name;
                                            $follow_pipe->save();

                                            lead_main::where('id', $lead_main_id)
                                            ->update([
                                                'last_sup_pipeline' => $sup_pipeline->id,
                                                'end_date' => date('Y-m-d' ,strtotime($lead_main_end_date. ' + '.$date_xx.' days')),
                                                'id_lead_list' => $lead->id
                                                ]);
                                        }
                                    }else{

                                        lead_main::where('id', $lead_main_id)
                                            ->update([
                                                'end_date' => date('Y-m-d' ,strtotime($lead_main_end_date. ' + '.$date_xx.' days')),
                                                'id_lead_list' => $lead->id
                                                ]);

                                    }

                                    
     

                }else{

                    $transportx = transport::where('transportname', $sale[20])->first();
                    if($transportx){
                        $tran_idx = $transportx->id;
                    }else{
                        $tran_idx = 7;
                    }


                    lead_list::where('name_customer', $sale[4])->where('pro_id', $pro_id)->where('phone_customer', '0'.$sale[5])->where('order_datex', date('Y-m-d', strtotime($sale[47])))
                    ->update(
                        [
                            'lead_lists_statusx' => 1,
                            'type_sale_lead_lists' => $sale[23],
                            'type_pro_lead_lists' => $sale[28],
                            'code_lead_lists' => $sale[2],
                            'lead_lists_status_sale' => $sale[10],
                            'lead_lists_payment_type' => $sale[11],
                            'lead_lists_payment_status' => $sale[12],
                            'status_upsale' => $sale[8],
                            'tracking_no' => $sale[21],
                            'tran_id' => $tran_idx,
                            'invoid_no' => $sale[13],
                            'price_pro' => $price_pro,
                            'total_sale' => $sale[33],
                            'discount_pro' => $discount_pro,
                            'sum_price_pro' => $sum_price_pro,
                            'sum_order_pro' => $sum_order_pro,
                            'sum_discount_buy_cus' => $sum_discount_buy_cus,
                            'sum_price_shipping' => $sum_price_shipping,
                            'sum_price_cod' => $sum_price_cod,
                            'sum_price_final' => $sum_price_final,
                            'sum_tax' => $sum_tax,
                            'sum_price_final2' => $sum_price_final2,
                            'tag' => $sale[43],
                            'note' => $sale[44],
                            'sale_employee' => $sale[45],
                            'upsale_name' => $sale[46],
                            'order_datex' => date('Y-m-d', strtotime($sale[47])),
                            'order_date' => $sale[47],
                            'pay_date' => $sale[48],
                            'product_name' => $sale[26],
                            'sku' => $sale[30],
                            'tra_name' => $sale[20],
                        ]
                    );

                }
                // end check_lead
            }
                }

            }

                unlink($file);
            }

            if($num > 0){
            $image = $request->file('file');

            $path = 'import/csv/';
            $filename = time()."-".$image->getClientOriginalName();
            $image->move($path, $filename);

            $objs = new fileup();
            $objs->file_name = $filename;
            $objs->user_id = Auth::user()->id;
            $objs->success_num = $num;
            $objs->save();

            }

            return redirect()->back()->with('success','Data Imported Successfully');

        // $file = $request->file('file');
        // if ($file) {
        // $fileContents = file($file->getPathname());
        
        // // foreach ($fileContents as $line) {
        // //     $data = str_getcsv($line);
        // //     //dd($data);
        // // }
        // // Excel::import(new UsersImport, $request->file('file')->store('temp'));
        // // return redirect()->back()->with('success','Data Imported Successfully');
        // }
    }
}
