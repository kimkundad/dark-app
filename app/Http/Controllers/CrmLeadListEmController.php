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
use App\Models\User;
use App\Models\customer_manager;
use Response;
use Auth;
use DataTables;

class CrmLeadListEmController extends Controller
{
    //

    public function crm_lead_status(){

        $objs = User::paginate(15);
        if($objs){
            foreach($objs as $u){

                $count = follow_pipe::where('upsale_idx', $u->id)->count();
                $u->follow_pipe = $count;
                $count2 = follow_pipe::where('upsale_idx', $u->id)->where('follow_pipes_status', 1)->count();
                $u->following_pipe = $count2;
                $count3 = follow_pipe::where('upsale_idx', $u->id)->where('follow_pipes_status', 0)->count();
                $u->following_piped = $count3;
            }
        }

        return view('admin.employee.crm_lead_status.index', compact('objs'));
    }

    public function crm_order_view($id){

        $objs = lead_list::select(
            'lead_lists.*',
            'lead_lists.id as id_q',
            'lead_lists.pro_id as pro_idx',
            'lead_lists.lead_lists_status_sale',
            'lead_lists.order_date',
            'lead_lists.sum_price_final',
            'lead_lists.lead_lists_statusx',
            'customer_managers.avatar as avatars',
            'customer_managers.phone as phones',
            'customer_managers.id as idcus',
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
            ->orderBy('lead_lists.id', 'desc')
            ->first();

           // dd($objs);

        return view('admin.employee.all_orders.crm_order_view', compact('objs'));
    }

    public function view(){

           // dd($objs);
           
           $user = User::all();


            $pipe = pipeline::get();
            
        
        return view('admin.employee.crm_lead_list.view', compact( 'pipe', 'user'));

    }

    public function get_crm_lead_list(Request $request){

        if ($request->ajax()) {

            $data = lead_main::select(
                'lead_mains.id as id_q',
                'lead_mains.user_id as user_id_cus',
                'lead_mains.created_at as created_ats',
                'lead_mains.end_date as end_dates',
                'customer_managers.*',
                'customer_managers.avatar as avatars',
                'customer_managers.phone as phones',
                'customer_managers.address as addressx',
                'sale_contacts.salename',
                'sale_contacts.sale_img',
                'pipelines.pipe_name',
                'sup_pipelines.name as name_sup_pipe',
                'users.name as names',
                )
                ->leftjoin('customer_managers', 'customer_managers.id',  'lead_mains.user_id')
                ->leftjoin('sale_contacts', 'sale_contacts.id',  'lead_mains.lead_lists_channels')
                ->leftjoin('pipelines', 'pipelines.id',  'lead_mains.pip_id')
                ->leftjoin('users', 'users.id',  'lead_mains.upsale_id')
                ->leftjoin('sup_pipelines', 'sup_pipelines.id',  'lead_mains.last_sup_pipeline')
                ->where('lead_mains.upsale_id', Auth::user()->id)
                ->orderBy('lead_mains.id', 'desc');
  
            if ($request->filled('search_name')) {
                $data = $data->where('customer_managers.fullname', 'like', "%" . $request->search_name . "%");
            }

            if ($request->filled('search_upsale')) {
                $data = $data->where('users.id', $request->search_upsale);
            }

            if ($request->filled('search_end_day')) {
                if($request->search_end_day == 1){
                    $data = $data->whereDate('lead_mains.end_date', '<', date('Y-m-d'));
                }else{
                    $data = $data->whereDate('lead_mains.end_date', '>=', date('Y-m-d'));
                }
                
            }

            return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                                $btn = '<div class="d-flex"><a href="#" data-id="'.$row->id_q.'" data-pipe="'.$row->pipe_name.'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 openModal">
                                        <span class="svg-icon svg-icon-3">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="currentColor"></path>
                                                <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </a>
                                    <a href="'.url('admin/crm_lead_list_view_em/'.$row->id_q).'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
										<span class="svg-icon svg-icon-3">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
												<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
											</svg>
										</span>
									</a>
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
										<span class="svg-icon svg-icon-3">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
												<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
												<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
											</svg>
										</span>
									</a></div>';
          
                                return $btn;
                        })
                        ->addColumn('ch', function($row){
           
                            $btn = '<div class="d-flex align-items-center">
                                    <div class="symbol symbol-circle symbol-35px overflow-hidden me-3">
                                        <img src="'.url('images/dark-app/saleContact/'.$row->sale_img).'" alt="'.$row->salename.'">
                                    </div>
                                </div>';
      
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
                ->addColumn('pipe_name', function($row){
       
                    $btnx = '<div class="badge badge-light-warning">'.$row->pipe_name.'</div>';

                    return $btnx;
            })
                        ->rawColumns(['action', 'ch', 'user', 'pipe_name'])
                        ->make(true);

        }

        return view('admin.employee.crm_lead_list.view');

    }


    public function get_waiting_distribute_crm(Request $request){

        if ($request->ajax()) {

            $data = lead_main::select(
                'lead_mains.id as id_q',
                'lead_mains.user_id as user_id_cus',
                'lead_mains.created_at as created_ats',
                'lead_mains.end_date as end_dates',
                'customer_managers.*',
                'customer_managers.avatar as avatars',
                'customer_managers.phone as phones',
                'customer_managers.address as addressx',
                'sale_contacts.salename',
                'sale_contacts.sale_img',
                'pipelines.pipe_name',
                'sup_pipelines.name as name_sup_pipe',
                'users.name as names',
                DB::raw('(select code_lead_lists from lead_lists where id = lead_mains.id_lead_list order by id desc limit 1) as order_id'),
                DB::raw('(select product_name from lead_lists where id = lead_mains.id_lead_list order by id desc limit 1) as product_name'),
                DB::raw('(select sum_price_final2 from lead_lists where id = lead_mains.id_lead_list order by id desc limit 1) as sum_price_final2'),
                DB::raw('(select note from lead_lists where id = lead_mains.id_lead_list order by id desc limit 1) as notex'),
                DB::raw('(select sku from lead_lists where id = lead_mains.id_lead_list order by id desc limit 1) as sku'),
                DB::raw('(select tra_name from lead_lists where id = lead_mains.id_lead_list order by id desc limit 1) as tra_name'),
                DB::raw('(select lead_lists_payment_type from lead_lists where id = lead_mains.id_lead_list order by id desc limit 1) as lead_lists_payment_type'),
                DB::raw('(select order_datex from lead_lists where id = lead_mains.id_lead_list order by id desc limit 1) as order_datex'),
                )
                ->leftjoin('customer_managers', 'customer_managers.id',  'lead_mains.user_id')
                ->leftjoin('sale_contacts', 'sale_contacts.id',  'lead_mains.lead_lists_channels')
                ->leftjoin('pipelines', 'pipelines.id',  'lead_mains.pip_id')
                ->leftjoin('users', 'users.id',  'lead_mains.upsale_id')
                ->leftjoin('sup_pipelines', 'sup_pipelines.id',  'lead_mains.last_sup_pipeline')
                ->where('lead_mains.upsale_id', 5)
                ->orderBy('lead_mains.id', 'desc');
  
            if ($request->filled('search_name')) {
                $data = $data->where('customer_managers.fullname', 'like', "%" . $request->search_name . "%");
            }

            if ($request->filled('search_upsale')) {
                $data = $data->where('users.id', $request->search_upsale);
            }

            if ($request->filled('search_end_day')) {
                if($request->search_end_day == 1){
                    $data = $data->whereDate('lead_mains.end_date', '<', date('Y-m-d'));
                }else{
                    $data = $data->whereDate('lead_mains.end_date', '>=', date('Y-m-d'));
                }
                
            }

            return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                                $btn = '<div class="d-flex"><a href="#" data-id="'.$row->id_q.'" data-pipe="'.$row->pipe_name.'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 openModal">
                                        <span class="svg-icon svg-icon-3">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="currentColor"></path>
                                                <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </a>
                                    <a href="'.url('admin/crm_lead_list_view_em/'.$row->id_q).'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
										<span class="svg-icon svg-icon-3">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
												<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
											</svg>
										</span>
									</a>
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
										<span class="svg-icon svg-icon-3">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
												<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
												<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
											</svg>
										</span>
									</a></div>';
          
                                return $btn;
                        })
                        ->addColumn('ch', function($row){
           
                            $btn = '<div class="d-flex align-items-center">
                                    <div class="symbol symbol-circle symbol-35px overflow-hidden me-3">
                                        <img src="'.url('images/dark-app/saleContact/'.$row->sale_img).'" alt="'.$row->salename.'">
                                    </div>
                                </div>';
      
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
                ->addColumn('pipe_name', function($row){
       
                    $btnx = '<div class="badge badge-light-warning">'.$row->pipe_name.'</div>';

                    return $btnx;
                })
                ->addColumn('check', function($row){
       
                    $btnx = '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="messageCheckbox form-check-input" name="translation_document_id[]" id="id_main_lead" type="checkbox" value="'.$row->id_q.'" />
                            </div>';

                    return $btnx;
                })
                ->addColumn('name_sup_pipe', function($row){
       
                    $btnx = '<div class="badge badge-light-primary">'.$row->name_sup_pipe.'</div>';

                    return $btnx;
                })
                ->addColumn('sum_price_final2', function($row){
       
                    $btnx = '<div class="badge badge-light-primary">'.number_format($row->sum_price_final2,2).'</div>';

                    return $btnx;
                })
                        ->rawColumns(['action', 'ch', 'user', 'pipe_name', 'check', 'name_sup_pipe', 'sum_price_final2'])
                        ->make(true);

        }

        return view('admin.employee.crm_lead_list.view');

    }


    public function waiting_distribute_crm(){

        $count = DB::table('lead_mains')->where('lead_mains.upsale_id', 5)->count();
        $objs = DB::table('lead_mains')->select(
            'lead_mains.*',
            'lead_mains.id as id_q',
            'lead_mains.user_id as user_id_cus',
            'lead_mains.created_at as created_ats',
            'customer_managers.*',
            'customer_managers.avatar as avatars',
            'customer_managers.phone as phones',
            'customer_managers.address as addressx',
            'sale_contacts.*',
            'pipelines.*',
            'users.*',
            'sup_pipelines.name as name_sup_pipe',
            'users.name as names',
            DB::raw('(select code_lead_lists from lead_lists where lead_main_id  =  lead_mains.id order by id desc limit 1) as order_id'),
            )
            ->leftjoin('customer_managers', 'customer_managers.id',  'lead_mains.user_id')
            ->leftjoin('sale_contacts', 'sale_contacts.id',  'lead_mains.lead_lists_channels')
            ->leftjoin('pipelines', 'pipelines.id',  'lead_mains.pip_id')
            ->leftjoin('users', 'users.id',  'lead_mains.upsale_id')
            ->leftjoin('sup_pipelines', 'sup_pipelines.id',  'lead_mains.last_sup_pipeline')
            ->where('lead_mains.upsale_id', 5)
            ->orderBy('lead_mains.id', 'desc')
            ->paginate(15);

    

            $objs->setPath('');
            $data['objs'] = $objs;

            $pipe = pipeline::get();

            $user = User::all();
            
        
        return view('admin.employee.waiting_distribute_crm.index', compact('objs', 'count', 'pipe', 'user'));

    }

    public function get_all_orders(Request $request){

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
                'customer_managers.id as idcus',
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
                ->where('lead_lists.upsale_id', Auth::user()->id)
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
                                <a href="'.url('admin/crm_order_view_em/'.$row->id_q).'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
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
                                    <a href="'.url('admin/customer_manager_his/'.$row->idcus).'" class="text-gray-800 text-hover-primary fs-8 fw-bold" >'.$row->fullname.'</a>
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

        return view('admin.employee.all_orders.index');

    }


    public function all_orders(){

        $count = DB::table('lead_lists')->count();
        $objs = DB::table('lead_lists')->select(
            'lead_lists.*',
            'lead_lists.id as id_q',
            'lead_lists.pro_id as pro_idx',
            'customer_managers.*',
            'customer_managers.avatar as avatars',
            'customer_managers.phone as phones',
            'sale_contacts.*',
            'pipelines.*',
            'transports.*',
            'users.*',
            'users.name as names',
            'products.*',
            )
            ->leftjoin('customer_managers', 'customer_managers.id',  'lead_lists.user_id')
            ->leftjoin('sale_contacts', 'sale_contacts.id',  'lead_lists.lead_lists_channels')
            ->leftjoin('pipelines', 'pipelines.id',  'lead_lists.pip_id')
            ->leftjoin('transports', 'transports.id',  'lead_lists.tran_id')
            ->leftjoin('products', 'products.id',  'lead_lists.pro_id')
            ->leftjoin('users', 'users.id',  'lead_lists.upsale_id')
            ->orderBy('lead_lists.id', 'desc')
            ->paginate(15);

           // dd($objs);

            $objs->setPath('');
            $data['objs'] = $objs;

            $pipe = pipeline::get();
            
        
        return view('admin.employee.all_orders.index', compact('objs', 'count', 'pipe'));

    }

    public function crm_lead_list_view($id){


        $objs = DB::table('lead_mains')->select(
            'lead_mains.*',
            'lead_mains.id as id_q',
            'lead_mains.user_id as user_id_cus',
            'lead_mains.created_at as created_ats',
            'lead_mains.upsale_id as upsale_idx',
            'customer_managers.*',
            'customer_managers.avatar as avatars',
            'customer_managers.phone as phones',
            'customer_managers.email as emails',
            'customer_managers.address as addressx',
            'sale_contacts.*',
            'pipelines.*',
            'pipelines.id as id_p',
            'users.*',
            'users.name as names',
            )
            ->leftjoin('customer_managers', 'customer_managers.id',  'lead_mains.user_id')
            ->leftjoin('sale_contacts', 'sale_contacts.id',  'lead_mains.lead_lists_channels')
            ->leftjoin('pipelines', 'pipelines.id',  'lead_mains.pip_id')
            ->leftjoin('users', 'users.id',  'lead_mains.upsale_id')
            ->where('lead_mains.id', $id)
            ->orderBy('lead_mains.id', 'desc')
            ->first();

            $lead_list = DB::table('lead_lists')->select(
                'lead_lists.*',
                'lead_lists.id as id_q',
                'lead_lists.created_at as created_ats',
                'products.*',
                )
                ->leftjoin('products', 'products.id',  'lead_lists.pro_id')
                ->where('lead_lists.lead_main_id', $objs->id_q)
                ->orderBy('lead_lists.id', 'desc')
                ->get();

            $timeline_check = timeline_pipe::where('lead_main_id', $objs->id_lead_list)->orderBy('id', 'desc')->first();
         

            $sup_pipeline = sup_pipeline::where('pipe_id', $objs->id_p)->get();
            $pipe = pipeline::get();
           //dd($sup_pipeline);
            $data['objs'] = $objs;

            $time_line = DB::table('timeline_pipes')->select(
                'timeline_pipes.*',
                'timeline_pipes.id as id_t',
                'timeline_pipes.created_at as created_ats',
                'users.*',
                'sup_pipelines.*',
                'sup_pipelines.name as namesub',
                )
                ->leftjoin('users', 'users.id',  'timeline_pipes.user_id')
                ->leftjoin('sup_pipelines', 'sup_pipelines.id',  'timeline_pipes.sub_pipe_id')
                ->where('timeline_pipes.lead_main_id', $objs->id_lead_list)
                ->orderBy('timeline_pipes.id', 'desc')
                ->get();


                $follow_pipes = DB::table('follow_pipes')->select(
                'follow_pipes.*',
                'follow_pipes.id as id_f',
                'follow_pipes.created_at as created_ats',
                'users.*',
                )
                ->leftjoin('users', 'users.id',  'follow_pipes.user_id_add')
                ->where('follow_pipes.read_id', $objs->id_lead_list)
                ->orderBy('follow_pipes.id', 'desc')
                ->get();

                $user = User::all();

        return view('admin.employee.crm_lead_list.edit', compact('objs', 'sup_pipeline', 'pipe', 'lead_list', 'time_line', 'timeline_check', 'follow_pipes', 'user'));

    }

   

    public function change_upsale_id_wait(Request $request){

      //  dd(count($request->ids)); upsale

        if(count($request->ids) > 0){

            for ($i = 0; $i < count($request->ids); $i++) {

                $objs = lead_main::where('id', $request->ids[$i])->first();
                
               // dd($request->ids[$i]);
                follow_pipe::where('read_id', $objs->id_lead_list)
                ->update(['upsale_idx' => $request->upsale]);

                lead_list::where('lead_main_id', $objs->id_lead_list)
                ->update(['upsale_id' => $request->upsale]);

                customer_manager::where('id', $objs->user_id)
                ->update(['upsale_id' => $request->upsale]);

                timeline_pipe::where('lead_main_id', $objs->id_lead_list)
                ->update(['user_id' => $request->upsale]);

                lead_main::where('id', $request->ids[$i])
                ->update(['upsale_id' => $request->upsale]);

            }

            return redirect(url('admin/waiting_distribute_crm_em/'))->with('edit_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

        }
        
    }

    public function add_change_upsale(Request $request, $id){

        $objs = lead_main::where('id', $id)->first();

        follow_pipe::where('read_id', $objs->id_lead_list)
        ->update(['upsale_idx' => $request->upsale_id]);

        timeline_pipe::where('lead_main_id', $objs->id_lead_list)
                ->update(['user_id' => $request->upsale_id]);

        lead_list::where('id', $objs->id_lead_list)
        ->update(['upsale_id' => $request->upsale_id]);

        customer_manager::where('id', $objs->user_id)
                ->update(['upsale_id' => $request->upsale_id]);

        lead_main::where('id', $id)
        ->update(['upsale_id' => $request->upsale_id]);

        

        return redirect(url('admin/crm_lead_list_em/'))->with('edit_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
    }

    public function crm_lead_list_view2($id){


        $objs = DB::table('lead_lists')->select(
            'lead_lists.*',
            'lead_lists.id as id_q',
            'customer_managers.*',
            'customer_managers.avatar as avatars',
            'customer_managers.phone as phones',
            'customer_managers.email as emails',
            'sale_contacts.*',
            'pipelines.*',
            'transports.*',
            'users.*',
            'users.name as names',
            )
            ->leftjoin('customer_managers', 'customer_managers.id',  'lead_lists.user_id')
            ->leftjoin('sale_contacts', 'sale_contacts.id',  'lead_lists.lead_lists_channels')
            ->leftjoin('pipelines', 'pipelines.id',  'lead_lists.pip_id')
            ->leftjoin('transports', 'transports.id',  'lead_lists.tran_id')
            ->leftjoin('users', 'users.id',  'lead_lists.upsale_id')
            ->where('lead_lists.id', $id)
            ->orderBy('lead_lists.id', 'desc')
            ->first();

           // dd($objs);
            $data['objs'] = $objs;

        return view('admin.employee.crm_lead_list.edit', compact('objs'));

    }

    public function add_timeline_pipeline(Request $request, $id){

        $this->validate($request, [
            'sub_pipe_id' => 'required'
        ]);

        $sup_pipeline = sup_pipeline::where('id', $request->sub_pipe_id)->first();
        $data_sup_pipeline = sup_pipeline::where('id', $sup_pipeline->id+1)->where('sort', $sup_pipeline->sort+1)->first();
        
        $lead_main = lead_main::where('id', $id)->first();

        follow_pipe::where('read_id', $lead_main->id_lead_list)
        ->update(['follow_pipes_status' => 1]);


           $objs = new timeline_pipe();
           $objs->user_id = Auth::user()->id;
           $objs->lead_main_id = $lead_main->id_lead_list;
           $objs->sub_pipe_id = $request->sub_pipe_id;
           $objs->note = $request->note;
           $objs->save();

           if($data_sup_pipeline){

            lead_main::where('id', $id)
           ->update([
            'last_sup_pipeline' => $request->sub_pipe_id,
            'end_date' => date('Y-m-d' ,strtotime($lead_main->end_date. ' + '.$data_sup_pipeline->day.' days'))
            ]);

            $obj = new follow_pipe();
            $obj->user_id_add = Auth::user()->id;
            $obj->upsale_idx = $request->upsale_idx;
            $obj->read_id = $lead_main->id_lead_list;
            $obj->sub_pipe_id = $data_sup_pipeline->id;
            $obj->note = $request->note;
            $obj->cus_id = $request->cus_id;
            $obj->date_follow = date('Y-m-d' ,strtotime($lead_main->end_date. ' + '.$data_sup_pipeline->day.' days'));
            $obj->save();
           }

           return redirect(url('admin/crm_lead_list_view_em/'.$id))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

    }

    public function add_new_pipeline_edit(Request $request, $id){

        $objs = lead_main::where('id', $id)->first();

        $objs = lead_main::find($id);
        $objs->pip_id = $request->pipe_id;
        $objs->save();

        lead_list::where('id', $objs->id_lead_list)
         ->update(['pip_id' => $request->pipe_id]);

           return redirect(url('admin/crm_lead_list_view_em/'.$id))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
    }

    public function change_pipe(Request $request){

        $objs = lead_main::where('id', $request->id)->first();

        $objs = lead_main::find($request->id);
        $objs->pip_id = $request->pipe;
        $objs->save();

        lead_list::where('id', $objs->id_lead_list)
         ->update(['pip_id' => $request->pipe_id]);

        return response()->json([
            'data' => 'success'
          ]);

    }
}
