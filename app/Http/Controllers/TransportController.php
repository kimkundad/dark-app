<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transport;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = transport::paginate(30);
        $objs->setPath('');
        $data['objs'] = $objs;
        // dd($objs);
        return view('admin.transport.index', compact('objs'));
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
        $data['url'] = url('admin/transport');
        return view('admin.transport.create', $data);
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
            'transportname' => 'required',
            'image' => 'required'
        ]);
           
           $image = $request->file('image');
           $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());
            $img->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
            });
            $img->stream();
            Storage::disk('do_spaces')->put('dark-app/transport/'.$image->hashName(), $img, 'public');


        $status = 0;
        if(isset($request['status'])){
            if($request['status'] == 1){
                $status = 1;
            }
        }
     
           $objs = new transport();
           $objs->transportname = $request['transportname'];
           $objs->transport_img = $image->hashName();
           $objs->status = $status;
           $objs->save();

           return redirect(url('admin/transport'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
        $objs = transport::find($id);
        $data['url'] = url('admin/transport/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.transport.edit', $data);
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
            'transportname' => 'required'
           ]);
           
           $image = $request->file('image');

           $status = 0;
            if(isset($request['status'])){
                if($request['status'] == 1){
                    $status = 1;
                }
            }

            if($image == NULL){

                $objs = transport::find($id);
                $objs->transportname = $request['transportname'];
                $objs->status = $status;
                $objs->save();
     
                }else{
     
                 $img = DB::table('transports')
               ->where('id', $id)
               ->first();
     
               $storage = Storage::disk('do_spaces');
               $storage->delete('dark-app/transport/' . $img->transport_img, 'public');
     
                 $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
     
               $img = Image::make($image->getRealPath());
               $img->resize(400, 400, function ($constraint) {
               $constraint->aspectRatio();
             });
             $img->stream();
             Storage::disk('do_spaces')->put('dark-app/transport/'.$image->hashName(), $img, 'public');
          
                $objs = transport::find($id);
                $objs->transportname = $request['transportname'];
                $objs->transport_img = $image->hashName();
                $objs->status = $status;
                $objs->save();
     
                }
                
                return redirect(url('admin/transport/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_transport($id)
    {
        //
        $objs = DB::table('transports')
            ->where('id', $id)
            ->first();

            if(isset($objs->sale_img)){
                $storage = Storage::disk('do_spaces');
                $storage->delete('dark-app/transport/' . $objs->transport_img, 'public');
            }

        $obj = transport::find($id);
        $obj->delete();

        return redirect(url('admin/transport/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
