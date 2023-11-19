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
            // dd($files);

            foreach ($files as $key => $file) {

                $data = array_map('str_getcsv', file($file));
                // if($key == 0){
                //     $header = $data[0];
                //     unset($data[0]);
                // }

                foreach ($data as $sale) {

                    //dd(date('Y-m-d', strtotime($sale[44])));

                    $check_lead = lead_list::where('name_customer', $sale[2])->where('phone_customer', '0'.$sale[3])->where('order_datex', date('Y-m-d', strtotime($sale[44])))->first();
                    
                    if(!$check_lead){

                    $user = customer_manager::where('fullname', $sale[2])->where('phone', '0'.$sale[3])->first();
                        
                    $sale_contact = sale_contact::where('salename', $sale[0])->first();
                        if($sale_contact){
                            $name_ch = $sale_contact->id;
                        }else{
                            $name_ch = 3;
                        }


                        $pipeline = pipeline::where('pipe_name', $sale[27])->first();
                    if($pipeline){
                        $pipeline_id = $pipeline->id;
                    }else{
                        $pipeline_id = 4;
                    }

                    if($sale[7] == '-'){
                        $sun_upsale = 0;
                    }else{

                        $sun_upsale = (float)substr($sale[7],2);;
                    }

                    $transport = transport::where('transportname', $sale[18])->first();
                    if($transport){
                        $tran_id = $transport->id;
                    }else{
                        $tran_id = 7;
                    }

                    $product = product::where('pro_name', $sale[23])->first();
                    if($product){
                        $pro_id = $product->id;
                    }else{
                        $pro_id = 0;
                    }

                    $user_name = User::where('name', $sale[43])->first();
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
                            $lead_main2->lead_name = $sale[2];
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
                        $objs->fullname = $sale[2];
                        $objs->codeuser = '0'.$sale[3];
                        $objs->phone = '0'.$sale[3];
                        $objs->phone2 = '0'.$sale[4];
                        $objs->sex = 'ไม่ระบุ';
                        $objs->type_address = 'ไม่ระบุ';
                        $objs->address = $sale[12];
                        $objs->Subdistrict = $sale[13];
                        $objs->district = $sale[14];
                        $objs->province = $sale[15];
                        $objs->zip_code = $sale[16];
                        $objs->county = $sale[17];
                        $objs->lock_avatar = 1;
                        $objs->avatar = $img_ran;
                        $objs->status = 1;
                        $objs->nickname = $sale[5];
                        $objs->channels = $name_ch;
                        $objs->save();

                        $user_id = $objs->id;

                        
                        $lead_main = new lead_main();
                        $lead_main->lead_name = $sale[2];
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
                   $lead->name_customer = $sale[2];
                   $lead->phone_customer = '0'.$sale[3];
                   $lead->lead_lists_channels = $name_ch;
                   $lead->type_sale_lead_lists = $sale[20];
                   $lead->type_pro_lead_lists = $sale[25]; 
                   $lead->code_lead_lists = $sale[1];
                   $lead->sun_upsale = $sun_upsale;
                   $lead->lead_lists_status_sale = $sale[8];
                   $lead->lead_lists_payment_type = $sale[9];
                   $lead->lead_lists_payment_status = $sale[10];
                   $lead->tracking_no = $sale[19];
                   $lead->tran_id = $tran_id;
                   $lead->invoid_no = $sale[11];
                   $lead->price_pro = $sale[29];
                   $lead->total_sale = $sale[30];
                   $lead->discount_pro = $sale[31];
                   $lead->sum_price_pro = $sale[32];
                   $lead->sum_order_pro = $sale[33];
                   $lead->sum_discount_buy_cus = $sale[34];
                   $lead->sum_price_shipping = $sale[35];
                   $lead->sum_price_cod = $sale[36];
                   $lead->sum_price_final = $sale[37];
                   $lead->sum_tax = $sale[38];
                   $lead->sum_price_final2 = $sale[39];
                   $lead->tag = $sale[40];
                   $lead->note = $sale[41];
                   $lead->sale_employee = $sale[42];
                   $lead->upsale_name = $sale[43];
                   $lead->order_date = $sale[44];
                   $lead->order_datex = date('Y-m-d', strtotime($sale[44]));
                   $lead->pay_date = $sale[45];
                   $lead->upsale_id = $upsale_id;
                   $lead->lead_main_id = $lead_main_id;
                   $lead->pro_id = $pro_id;
                   $lead->lead_lists_statusx = 1;
                   $lead->save();

                }else{

                    lead_list::where('name_customer', $sale[2])->where('phone_customer', '0'.$sale[3])->where('order_datex', date('Y-m-d', strtotime($sale[44])))
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
