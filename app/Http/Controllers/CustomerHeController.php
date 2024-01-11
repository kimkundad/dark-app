<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer_manager;
use App\Models\sale_contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Response;
use DataTables;
use App\Models\pipeline;
use App\Models\sup_pipeline;
use App\Models\lead_main;
use App\Models\timeline_pipe;
use App\Models\follow_pipe;
use App\Models\lead_list;
use Auth;
use App\Models\User;

class CustomerHeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        return view('admin.head.customer_manager.index');
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
        $data['url'] = url('admin/customer_manager_he');
        return view('admin.head.customer_manager.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function get_customer(Request $request){


            if ($request->ajax()) {

                $myuser = User::where('main_id', Auth::user()->id)->pluck('id')->toArray();
            // $user = User::whereIn('id', $myuser)->get();

                $data = customer_manager::select(
                    'customer_managers.*',
                    'customer_managers.id as id_q',
                    'customer_managers.created_at as created_ats',
                    'sale_contacts.sale_img',
                    'sale_contacts.salename'
                    )
                    ->leftjoin('sale_contacts', 'sale_contacts.id',  'customer_managers.channels')
                    ->whereIn('customer_managers.upsale_id', $myuser)
                    ->orderby('customer_managers.created_at', 'desc');
      
                if ($request->filled('search_name')) {
                    $data = $data->where('fullname', 'like', "%" . $request->search_name . "%");
                }
              //  dd($data);
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
           
                                $btn = '<a href="'.url('admin/customer_manager_he/'.$row->id_q.'/edit').'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <span class="svg-icon svg-icon-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </a>
                            <a href="'.url('api/del_customer/'.$row->id_q).'" onclick="return confirm("คุณต้องการลบข้อมูลนี้ใช่ไหม?")" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                <span class="svg-icon svg-icon-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </a>';
          
                                return $btn;
                        })
                        ->addColumn('ch', function($row){
           
                            $btn = '<div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px me-5">
                                        <img src="'.url('images/dark-app/saleContact/'.$row->sale_img).'" alt="'.$row->sale_img.'">
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">'.$row->salename.'</a>
                                    </div>
                                </div>';
      
                            return $btn;
                    })
                        ->rawColumns(['action', 'ch'])
                        ->make(true);
            }
                
            return view('admin.head.customer_manager.index');
        }
            


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
           $objs->channels = $request['channels'];
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
           $objs->channels = $request['channels'];
           $objs->save();

        }

        return redirect(url('admin/customer_manager_he'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function customer_manager_his($id)
    {
        //
        $objs = customer_manager::find($id);
        
        return view('admin.head.customer_manager.customer_manager_his', compact('objs'));
    }

    public function get_customer_manager_his(Request $request, $id){


        if ($request->ajax()) {


            $data = lead_list::select(
                'lead_lists.id as id_q',
                'lead_lists.pro_id as pro_idx',
                'lead_lists.lead_lists_status_sale',
                'lead_lists.order_date',
                'lead_lists.sum_price_final',
                'lead_lists.lead_lists_statusx',
                'customer_managers.avatar as avatars',
                'customer_managers.phone as phones',
                'customer_managers.fullname',
                'sale_contacts.salename',
                'pipelines.pipe_name',
                'transports.transportname',
                'users.name as names',
                'products.pro_name',
                )
                ->leftjoin('customer_managers', 'customer_managers.id',  'lead_lists.user_id')
                ->leftjoin('sale_contacts', 'sale_contacts.id',  'lead_lists.lead_lists_channels')
                ->leftjoin('pipelines', 'pipelines.id',  'lead_lists.pip_id')
                ->leftjoin('transports', 'transports.id',  'lead_lists.tran_id')
                ->leftjoin('products', 'products.id',  'lead_lists.pro_id')
                ->leftjoin('users', 'users.id',  'lead_lists.upsale_id')
                ->where('customer_managers.upsale_id', Auth::user()->id)
                ->where('customer_managers.id', $id)
                ->orderBy('lead_lists.id', 'desc');

            if ($request->filled('search_name')) {
                $data = $data->where('lead_lists.name_customer', 'like', "%" . $request->search_name . "%");
            }

            if ($request->filled('search_status')) {

                if($request->search_status == 0){
                    $data = $data->where('lead_lists.lead_lists_statusx', 0);
                }
                if($request->search_status == 1){
                    $data = $data->where('lead_lists.lead_lists_statusx', 1);
                }
                
            }


            return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                                $btn = '<div class="d-flex">
                                <a href="'.url('admin/crm_order_view_he/'.$row->id_q).'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <span class="svg-icon svg-icon-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                </a></div>';
          
                                return $btn;
                        })
                    ->addColumn('user', function($row){
       
                        $btnx = '<div class="d-flex align-items-center">
                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                        <div class="symbol-label">
                                            <img src="'.url('images/dark-app/avatar/'.$row->avatars).'" alt="'.$row->fullname.'" class="w-100" />
                                        </div>
                                </div>
                                <div class="ms-5">
                                    <a class="text-gray-800 text-hover-primary fs-8 fw-bold" >'.$row->fullname.'</a>
                                </div>
                            </div>';
  
                        return $btnx;
                })
                ->addColumn('status_or', function($row){

                    if($row->lead_lists_statusx == 0){
                        $btnx = '<div class="badge badge-light-primary">รอจับคู่</div>';
                    }else{
                        $btnx = '<div class="badge badge-light-danger">จับคู่แล้ว</div>';
                    }
                    return $btnx;
                })
                ->addColumn('pro_name', function($row){
                    if($row->pro_idx == 0){
                        $btn = '<div class="badge badge-light-warning">(ยังไม่มีสินค้าในระบบ)</div>';
                    }else{
                        $btn = '<div class="badge badge-light-danger">'.$row->pro_name.'</div>';
                    }
                    return $btn;
                })
                ->addColumn('status_salexx', function($row){

                    $btn = '<div class="badge badge-light-primary">'.$row->lead_lists_status_sale.'</div>';
                    return $btn;
                })
                        ->rawColumns(['action', 'user', 'status_or', 'pro_name', 'status_salexx'])
                        ->make(true);

        }

        return view('admin.head.customer_manager.customer_manager_his');


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
        $data['url'] = url('admin/customer_manager_he/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        $data['c_id'] = $id;
        return view('admin.head.customer_manager.edit', $data);
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
           $objs->channels = $request['channels'];
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
                $objs->channels = $request['channels'];
                $objs->save();

            }

            return redirect(url('admin/customer_manager_he/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');

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
