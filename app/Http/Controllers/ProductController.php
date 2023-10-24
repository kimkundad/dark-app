<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\category;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = DB::table('products')->select(
            'products.*',
            'products.id as id_q',
            'products.status as status1',
            'categories.*'
            )
            ->leftjoin('categories', 'categories.id',  'products.cat_id')
            ->orderBy('products.id', 'desc')
            ->paginate(15);

        $objs->setPath('');
        $data['objs'] = $objs;
        // dd($objs);
        return view('admin.product_manager.index', compact('objs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cat = category::where('status', 1)->get();
        $data['rand'] = rand(0000000000,9999999999);
        $data['cat'] = $cat;
        $data['method'] = "post";
        $data['url'] = url('admin/product_manager');
        return view('admin.product_manager.create', $data);
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
            'pro_name' => 'required',
            'pro_img' => 'required',
            'price' => 'required',
            'tax' => 'required',
            'total' => 'required',
            'weight' => 'required'
        ]);

          $image = $request->file('pro_img');
          $img = Image::make($image->getRealPath());
          $img->resize(800, 800, function ($constraint) {
          $constraint->aspectRatio();
          });
        $img->stream();
        Storage::disk('do_spaces')->put('dark-app/product/'.$image->hashName(), $img, 'public');

        $objs = new product();
           $objs->pro_name = $request['pro_name'];
           $objs->pro_img = $image->hashName();
           $objs->pro_code = $request['pro_code'];
           $objs->bar_code = $request['bar_code'];
           $objs->price = $request->filled('price') ? $request->input('price') : 0.0;
           $objs->cost = $request->filled('cost') ? $request->input('cost') : 0.0;
           $objs->tax = $request['tax'];
           $objs->type_product = $request->filled('type_product') ? $request->input('type_product') : 0;
           $objs->total = $request->filled('total') ? $request->input('total') : 0;
           $objs->detail = $request['detail'];
           $objs->cat_id = $request['cat_id'];
           $objs->weight = $request->filled('weight') ? $request->input('weight') : 0.0;
           $objs->width = $request->filled('width') ? $request->input('width') : 0.0;
           $objs->status = $request['status'];
           $objs->height = $request->filled('height') ? $request->input('height') : 0.0; $request['height'];
           $objs->pro_length = $request->filled('pro_length') ? $request->input('pro_length') : 0.0;
           $objs->user_create = Auth::user()->id;
           $objs->save();

           return redirect(url('admin/product_manager'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

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
        $cat = category::where('status', 1)->get();
        $data['cat'] = $cat;
        $objs = product::find($id);
        $data['url'] = url('admin/product_manager/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.product_manager.edit', $data);
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
            'pro_name' => 'required',
            'price' => 'required',
            'tax' => 'required',
            'total' => 'required',
            'weight' => 'required'
        ]);

        $image = $request->file('pro_img');

        if($image == NULL){

           $objs = product::find($id);
           $objs->pro_name = $request['pro_name'];
           $objs->pro_code = $request['pro_code'];
           $objs->bar_code = $request['bar_code'];
           $objs->price = $request->filled('price') ? $request->input('price') : 0.0;
           $objs->cost = $request->filled('cost') ? $request->input('cost') : 0.0;
           $objs->tax = $request['tax'];
           $objs->type_product = $request->filled('type_product') ? $request->input('type_product') : 0;
           $objs->total = $request->filled('total') ? $request->input('total') : 0;
           $objs->detail = $request['detail'];
           $objs->cat_id = $request['cat_id'];
           $objs->weight = $request->filled('weight') ? $request->input('weight') : 0.0;
           $objs->width = $request->filled('width') ? $request->input('width') : 0.0;
           $objs->status = $request['status'];
           $objs->height = $request->filled('height') ? $request->input('height') : 0.0; $request['height'];
           $objs->pro_length = $request->filled('pro_length') ? $request->input('pro_length') : 0.0;
           $objs->save();

        }else{

            $img = DB::table('products')
            ->where('id', $id)
            ->first();
  
            $storage = Storage::disk('do_spaces');
            $storage->delete('dark-app/product/' . $img->pro_img, 'public');
            $img = Image::make($image->getRealPath());
            $img->resize(800, 800, function ($constraint) {
            $constraint->aspectRatio();
            });
            $img->stream();
            Storage::disk('do_spaces')->put('dark-app/product/'.$image->hashName(), $img, 'public');

            $objs = product::find($id);
           $objs->pro_name = $request['pro_name'];
           $objs->pro_img = $image->hashName();
           $objs->pro_code = $request['pro_code'];
           $objs->bar_code = $request['bar_code'];
           $objs->price = $request->filled('price') ? $request->input('price') : 0.0;
           $objs->cost = $request->filled('cost') ? $request->input('cost') : 0.0;
           $objs->tax = $request['tax'];
           $objs->type_product = $request->filled('type_product') ? $request->input('type_product') : 0;
           $objs->total = $request->filled('total') ? $request->input('total') : 0;
           $objs->detail = $request['detail'];
           $objs->cat_id = $request['cat_id'];
           $objs->weight = $request->filled('weight') ? $request->input('weight') : 0.0;
           $objs->width = $request->filled('width') ? $request->input('width') : 0.0;
           $objs->status = $request['status'];
           $objs->height = $request->filled('height') ? $request->input('height') : 0.0; $request['height'];
           $objs->pro_length = $request->filled('pro_length') ? $request->input('pro_length') : 0.0;
           $objs->user_create = Auth::user()->id;
           $objs->save();

        }

        return redirect(url('admin/product_manager/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_product_manager($id)
    {
        //
        $objs = DB::table('products')
            ->where('id', $id)
            ->first();

            if(isset($objs->pro_img)){
                $storage = Storage::disk('do_spaces');
                $storage->delete('dark-app/product/' . $objs->pro_img, 'public');
            }

        $obj = product::find($id);
        $obj->delete();

        return redirect(url('admin/product_manager/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
