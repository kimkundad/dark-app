<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer_manager;
use App\Models\sale_contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = DB::table('customer_managers')->select(
            'customer_managers.*',
            'customer_managers.id as id_q',
            'customer_managers.created_at as created_ats',
            'sale_contacts.sale_img',
            'sale_contacts.salename'
            )
            ->leftjoin('sale_contacts', 'sale_contacts.id',  'customer_managers.channels')
            ->orderby('customer_managers.created_at', 'desc')
            ->paginate(15);

            $objs->setPath('');

        return view('admin.customer_manager.index', compact('objs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cat = sale_contact::where('status', 1)->get();
        $data['cat'] = $cat;
        $data['method'] = "post";
        $data['url'] = url('admin/customer_manager');
        return view('admin.customer_manager.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'fullname' => 'required',
            'phone' => 'required',
            'sex' => 'required',
            'type_address' => 'required',
            'address' => 'required',
            'Subdistrict' => 'required',
            'district' => 'required',
            'province' => 'required',
            'zip_code' => 'required',
            'county' => 'required'
        ]);

        $image = $request->file('avatar');

        $status = 0;
            if(isset($request['status'])){
                if($request['status'] == 1){
                    $status = 1;
                }
            }

        $codeuser = 'CM'.rand(11111111,99999999);
        
        if($image == NULL){
            $img_ran = '300-'.rand(1,30).'.jpg';
            $lock_avatar = 1;

           $objs = new customer_manager();
           $objs->fullname = $request['fullname'];
           $objs->codeuser = $codeuser;
           $objs->phone = $request['phone'];
           $objs->phone2 = $request['phone2'];
           $objs->sex = $request['sex'];
           $objs->type_address = $request['type_address'];
           $objs->address = $request['address'];
           $objs->Subdistrict = $request['Subdistrict'];
           $objs->district = $request['district'];
           $objs->province = $request['province'];
           $objs->zip_code = $request['zip_code'];
           $objs->county = $request['county'];
           $objs->lock_avatar = $lock_avatar;
           $objs->avatar = $img_ran;
           $objs->status = $status;
           $objs->nickname = $request['nickname'];
           $objs->hbd = $request['hbd'];
           $objs->email = $request['email'];
           $objs->line = $request['line'];
           $objs->save();

        }else{
            $lock_avatar = 0;

            $img = Image::make($image->getRealPath());
            $img->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
            });
            $img->stream();
            Storage::disk('do_spaces')->put('dark-app/avatar/'.$image->hashName(), $img, 'public');

            $objs = new customer_manager();
           $objs->fullname = $request['fullname'];
           $objs->codeuser = $codeuser;
           $objs->phone = $request['phone'];
           $objs->phone2 = $request['phone2'];
           $objs->sex = $request['sex'];
           $objs->type_address = $request['type_address'];
           $objs->address = $request['address'];
           $objs->Subdistrict = $request['Subdistrict'];
           $objs->district = $request['district'];
           $objs->province = $request['province'];
           $objs->zip_code = $request['zip_code'];
           $objs->county = $request['county'];
           $objs->lock_avatar = $lock_avatar;
           $objs->avatar = $image->hashName();
           $objs->status = $status;
           $objs->nickname = $request['nickname'];
           $objs->hbd = $request['hbd'];
           $objs->email = $request['email'];
           $objs->line = $request['line'];
           $objs->save();

        }

        return redirect(url('admin/customer_manager'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cat = sale_contact::where('status', 1)->get();
        $data['cat'] = $cat;
        $objs = customer_manager::find($id);
        $data['url'] = url('admin/customer_manager/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        $data['c_id'] = $id;
        return view('admin.customer_manager.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [
            'fullname' => 'required',
            'phone' => 'required',
            'sex' => 'required',
            'type_address' => 'required',
            'address' => 'required',
            'Subdistrict' => 'required',
            'district' => 'required',
            'province' => 'required',
            'zip_code' => 'required',
            'county' => 'required'
        ]);

        $cus = customer_manager::find($id);
        // dd($cus);
        $image = $request->file('avatar');

        $status = 0;
            if(isset($request['status'])){
                if($request['status'] == 1){
                    $status = 1;
                }
            }

            if($image == NULL){

           $objs = customer_manager::find($id);
           $objs->fullname = $request['fullname'];
           $objs->phone = $request['phone'];
           $objs->phone2 = $request['phone2'];
           $objs->sex = $request['sex'];
           $objs->type_address = $request['type_address'];
           $objs->address = $request['address'];
           $objs->Subdistrict = $request['Subdistrict'];
           $objs->district = $request['district'];
           $objs->province = $request['province'];
           $objs->zip_code = $request['zip_code'];
           $objs->county = $request['county'];
           $objs->status = $status;
           $objs->nickname = $request['nickname'];
           $objs->hbd = $request['hbd'];
           $objs->email = $request['email'];
           $objs->line = $request['line'];
           $objs->save();

            }else{

                    if($cus->lock_avatar == 1){

                        $obj = customer_manager::find($id);
                        $obj->lock_avatar = 0;
                        $obj->save();

                    }else{

                        $storage = Storage::disk('do_spaces');
                        $storage->delete('dark-app/avatar/' . $cus->avatar, 'public');
                    }
                    

                    $img = Image::make($image->getRealPath());
                    $img->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                    });
                    $img->stream();
                    Storage::disk('do_spaces')->put('dark-app/avatar/'.$image->hashName(), $img, 'public');


                $objs = customer_manager::find($id);
                $objs->fullname = $request['fullname'];
                $objs->phone = $request['phone'];
                $objs->phone2 = $request['phone2'];
                $objs->sex = $request['sex'];
                $objs->type_address = $request['type_address'];
                $objs->address = $request['address'];
                $objs->Subdistrict = $request['Subdistrict'];
                $objs->district = $request['district'];
                $objs->province = $request['province'];
                $objs->zip_code = $request['zip_code'];
                $objs->county = $request['county'];
                $objs->status = $status;
                $objs->nickname = $request['nickname'];
                $objs->hbd = $request['hbd'];
                $objs->email = $request['email'];
                $objs->line = $request['line'];
                $objs->avatar = $image->hashName();
                $objs->save();

            }

            return redirect(url('admin/customer_manager/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_customer($id)
    {
        //
    }
}
