<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sale_contact;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SaleContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = sale_contact::paginate(30);
        $objs->setPath('');
        $data['objs'] = $objs;
   
        return view('admin.sale_contact.index', compact('objs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['method'] = "post";
        $data['url'] = url('admin/sale_contact');
        return view('admin.sale_contact.create', $data);
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
            'salename' => 'required',
            'image' => 'required'
        ]);
           
           $image = $request->file('image');
           $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());
            $img->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
            });
            $img->stream();
            Storage::disk('do_spaces')->put('dark-app/saleContact/'.$image->hashName(), $img, 'public');


        $status = 0;
        if(isset($request['status'])){
            if($request['status'] == 1){
                $status = 1;
            }
        }
     
           $objs = new sale_contact();
           $objs->salename = $request['salename'];
           $objs->sale_img = $image->hashName();
           $objs->status = $status;
           $objs->save();

           return redirect(url('admin/sale_contact'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
        $objs = sale_contact::find($id);
        $data['url'] = url('admin/sale_contact/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.sale_contact.edit', $data);
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
            'salename' => 'required'
           ]);
           
           $image = $request->file('image');

           $status = 0;
            if(isset($request['status'])){
                if($request['status'] == 1){
                    $status = 1;
                }
            }

            if($image == NULL){

                $objs = sale_contact::find($id);
                $objs->salename = $request['salename'];
                $objs->status = $status;
                $objs->save();
     
                }else{
     
                 $img = DB::table('sale_contacts')
               ->where('id', $id)
               ->first();
     
               $storage = Storage::disk('do_spaces');
               $storage->delete('dark-app/saleContact/' . $img->sale_img, 'public');
     
                 $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
     
               $img = Image::make($image->getRealPath());
               $img->resize(400, 400, function ($constraint) {
               $constraint->aspectRatio();
             });
             $img->stream();
             Storage::disk('do_spaces')->put('dark-app/saleContact/'.$image->hashName(), $img, 'public');
          
                $objs = sale_contact::find($id);
                $objs->salename = $request['salename'];
                $objs->sale_img = $image->hashName();
                $objs->status = $status;
                $objs->save();
     
                }
                
                return redirect(url('admin/sale_contact/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_sale_contact($id)
    {

        $objs = DB::table('sale_contacts')
            ->where('id', $id)
            ->first();

            if(isset($objs->sale_img)){
                $storage = Storage::disk('do_spaces');
                $storage->delete('dark-app/saleContact/' . $objs->sale_img, 'public');
            }

        $obj = sale_contact::find($id);
        $obj->delete();

        return redirect(url('admin/sale_contact/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
