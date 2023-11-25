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

class LeadImportController extends Controller
{
    //
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
             

            foreach ($files as $key => $file) {

                $data = array_map('str_getcsv', file($file));
                // if($key == 0){
                //     $header = $data[0];
                //     unset($data[0]);
                // }

                // dd($data);

                foreach ($data as $sale) {

                    //dd(date('Y-m-d', strtotime($sale[47])));

                    $check_lead = lead_list::where('name_customer', $sale[4])->where('phone_customer', '0'.$sale[5])->where('order_datex', date('Y-m-d', strtotime($sale[47])))->first();
                    
                    if(!$check_lead){

                    $user = customer_manager::where('fullname', $sale[4])->where('phone', '0'.$sale[5])->first();
                        
                    $sale_contact = sale_contact::where('salename', $sale[1])->first();
                        if($sale_contact){
                            $name_ch = $sale_contact->id;
                        }else{
                            $name_ch = 3;
                        }


                        $pipeline = pipeline::where('pipe_name', $sale[30])->first();
                    if($pipeline){
                        $pipeline_id = $pipeline->id;
                    }else{
                        $pipeline_id = 4;
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

                    $product = product::where('pro_name', $sale[26])->first();
                    if($product){
                        $pro_id = $product->id;
                    }else{
                        $pro_id = 0;
                    }

                    $user_name = User::where('name', $sale[46])->first();
                    if($user_name){
                        $upsale_id = $user_name->id;
                    }else{
                        $upsale_id = 5;
                    }

                    $date = strtotime("+3 day");

                    if($user){
                        $user_id = $user->id;

                        $check_lead_main = lead_main::where('user_id', $user->id)->first();

                        if($check_lead_main){
                            $lead_main_id = $check_lead_main->id;
                        }else{

                            $lead_main2 = new lead_main();
                            $lead_main2->lead_name = $sale[4];
                            $lead_main2->user_id = $user_id;
                            $lead_main2->pip_id = $pipeline_id;
                            $lead_main2->lead_lists_channels = $name_ch;
                            $lead_main2->upsale_id = $upsale_id;
                            $lead_main2->end_date = date('Y-m-d' ,$date);
                            $lead_main2->save();
                            $lead_main_id = $lead_main2->id;

                        }

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

                        
                        $lead_main = new lead_main();
                        $lead_main->lead_name = $sale[4];
                        $lead_main->user_id = $user_id;
                        $lead_main->pip_id = $pipeline_id;
                        $lead_main->lead_lists_channels = $name_ch;
                        $lead_main->upsale_id = $upsale_id;
                        $lead_main->end_date = date('Y-m-d' ,$date);
                        $lead_main->save();
                        $lead_main_id = $lead_main->id;

                    }
                   // dd($sale);

                   $lead = new lead_list();
                   $lead->user_id = $user_id;
                   $lead->pip_id = $pipeline_id;
                   $lead->name_customer = $sale[4];
                   $lead->phone_customer = '0'.$sale[5];
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
                   $lead->price_pro = $sale[32];
                   $lead->total_sale = $sale[33];
                   $lead->discount_pro = $sale[34];
                   $lead->sum_price_pro = $sale[35];
                   $lead->sum_order_pro = $sale[36];
                   $lead->sum_discount_buy_cus = $sale[37];
                   $lead->sum_price_shipping = $sale[38];
                   $lead->sum_price_cod = $sale[39];
                   $lead->sum_price_final = $sale[40];
                   $lead->sum_tax = $sale[41];
                   $lead->sum_price_final2 = $sale[42];
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
                   $lead->save();

                }else{

                    lead_list::where('name_customer', $sale[4])->where('phone_customer', '0'.$sale[5])->where('order_datex', date('Y-m-d', strtotime($sale[47])))
                    ->update(['lead_lists_statusx' => 1]);

                }
                // end check_lead
                }
                unlink($file);
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
