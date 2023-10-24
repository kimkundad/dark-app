<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Models\customer_manager;
use App\Models\sale_contact;

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
                    
                    $user = customer_manager::where('fullname', $sale[2])->where('phone', '0'.$sale[3])->first();
                
                    if($user){

                    }else{

                        $sale_contact = sale_contact::where('salename', $sale[0])->first();
                        if($sale_contact){
                            $name_ch = $sale_contact->id;
                        }else{
                            $name_ch = 3;
                        }
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

                    }
                   // dd($sale);
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
