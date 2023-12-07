<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\follow_pipe;
use App\Models\lead_main;
use App\Models\User;
use Response;
use Auth;
use DataTables;

class crmLeadFollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function get_crm_lead_follow(Request $request){

        if ($request->ajax()) {

           

            $data = DB::table('follow_pipes')->select(
                'follow_pipes.id as id_f',
                'follow_pipes.created_at as created_ats',
                'follow_pipes.note as notes',
                'follow_pipes.follow_pipes_status',
                'follow_pipes.date_follow',
                'follow_pipes.night_set',
                'users.name',
                'lead_mains.lead_name',
                'lead_mains.id as id_q',
                'pipelines.pipe_name',
                'sup_pipelines.name as sub_namex'
                )
                ->leftjoin('users', 'users.id',  'follow_pipes.upsale_idx')
                ->leftjoin('lead_mains', 'lead_mains.id',  'follow_pipes.read_id')
                ->leftjoin('sup_pipelines', 'sup_pipelines.id',  'follow_pipes.sub_pipe_id')
                ->leftjoin('pipelines', 'pipelines.id',  'sup_pipelines.pipe_id')
                ->where('follow_pipes.night_set', 0)
                ->orderBy('follow_pipes.follow_pipes_status', 'asc')
                ->orderBy('follow_pipes.created_at', 'desc');

            // if ($request->filled('start_date')) {
            //     $data = $data->where('customer_managers.fullname', 'like', "%" . $request->search_name . "%");
            // }

            if ($request->filled('start_date') && $request->filled('end_date')) {
                $data = $data->whereBetween('follow_pipes.date_follow', [$request->start_date, $request->end_date]);
            }
            if ($request->filled('start_date') && !$request->filled('end_date')) {
                $data = $data->whereDate('follow_pipes.date_follow', $request->start_date);
            }
            if ($request->filled('upsale_id')) {
                $data = $data->where('users.id', $request->upsale_id);
            }
            if ($request->filled('status_follow')) {

                if($request->status_follow == 1){
                    $data = $data->where('follow_pipes.follow_pipes_status', 0);
                }
                if($request->status_follow == 2){
                    $data = $data->where('follow_pipes.follow_pipes_status', 1);
                }
                
            }

            if ($request->filled('status_date')) {

                if($request->status_date == 1){
                    $data = $data->whereDate('follow_pipes.date_follow', '<', date('Y-m-d'));
                }
                if($request->status_date == 2){
                    $data = $data->whereDate('follow_pipes.date_follow', '>=', date('Y-m-d'));
                }
                
            }


            return Datatables::of($data)
                        ->addIndexColumn()
                        ->setRowId(function ($row) {
                            return $row->id_f;
                        })
                        ->addColumn('action', function($row){

                                $btn = '<a href="'.url('admin/crm_lead_list_view/'.$row->id_q).'" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor"></rect>
                                        <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                </a>';
          
                                return $btn;
                        })
                        ->addColumn('follow_pipes_status', function($row){

                            if($row->follow_pipes_status == 1){
                                $btn = '<div id="LangTable"><a class="clickme" id="clickme'.$row->id_f.'" href="#">
                                <span class="badge py-3 px-4 fs-7 badge-light-success">
                                    <span class="svg-icon svg-icon-1 svg-icon-success"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"/>
                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor"/>
                                    </svg>
                                    </span> ติดตามแล้ว</span>
                                </a></div>';
                            }else{
                                $btn = '<div id="LangTable"><a class="clickme" id="clickme'.$row->id_f.'" href="#">
                                <span class="badge py-3 px-4 fs-7 badge-light-danger">
                                    <span class="svg-icon svg-icon-1 svg-icon-danger"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.5 20.7259C14.6 21.2259 14.2 21.826 13.7 21.926C13.2 22.026 12.6 22.0259 12.1 22.0259C9.5 22.0259 6.9 21.0259 5 19.1259C1.4 15.5259 1.09998 9.72592 4.29998 5.82592L5.70001 7.22595C3.30001 10.3259 3.59999 14.8259 6.39999 17.7259C8.19999 19.5259 10.8 20.426 13.4 19.926C13.9 19.826 14.4 20.2259 14.5 20.7259ZM18.4 16.8259L19.8 18.2259C22.9 14.3259 22.7 8.52593 19 4.92593C16.7 2.62593 13.5 1.62594 10.3 2.12594C9.79998 2.22594 9.4 2.72595 9.5 3.22595C9.6 3.72595 10.1 4.12594 10.6 4.02594C13.1 3.62594 15.7 4.42595 17.6 6.22595C20.5 9.22595 20.7 13.7259 18.4 16.8259Z" fill="currentColor"/>
                                    <path opacity="0.3" d="M2 3.62592H7C7.6 3.62592 8 4.02592 8 4.62592V9.62589L2 3.62592ZM16 14.4259V19.4259C16 20.0259 16.4 20.4259 17 20.4259H22L16 14.4259Z" fill="currentColor"/>
                                    </svg>
                                    </span> รอติดตาม
                                </span>
                                </a></div>';
                            }
      
                            return $btn;
                    })
                    ->addColumn('user', function($row){
       
                        $btnx = '<div>
                                    <a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">'.$row->lead_name.'</a>
                                    <span class="text-muted fw-semibold d-block fs-7">โดย '.$row->name.'</span>
                                </div>';
  
                        return $btnx;
                })
                ->addColumn('date_follow2', function($row){

                    if($row->date_follow < date('Y-m-d')){
                        $btnx = '<a href="" class="text-hover-primary text-gray-600"><span class="badge badge-light-danger fs-7 fw-bold">หมดอายุ</span></a>';
                    }else{
                        $btnx = '<a href="" class="text-hover-primary text-gray-600"><span class="badge badge-light-success fs-7 fw-bold">ใช้งานได้</span></a>';
                    }

                    return $btnx;
            })
            ->addColumn('date_followc', function($row){

                if($row->date_follow < date('Y-m-d')){
                    $btnx = '<a href="" class="text-hover-primary text-gray-600"><span class="badge badge-light-danger fs-7 fw-bold">'.$row->date_follow.'</span></a>';
                }else{
                    $btnx = '<a href="" class="text-hover-primary text-gray-600"><span class="badge badge-light-success fs-7 fw-bold">'.$row->date_follow.'</span></a>';
                }

                return $btnx;
        })
            ->addColumn('sub_namex', function($row){

                $btnx = '<div class="badge badge-light-primary">'.$row->sub_namex.'</div>';

                return $btnx;
        })
                        ->rawColumns(['action', 'follow_pipes_status', 'user', 'date_follow2', 'sub_namex', 'date_followc'])
                        ->make(true);
        }
        

        return view('admin.crm_lead_follow.index');

    }

    public function crm_lead_follow()
    {

        //
        $count = follow_pipe::count();
        $objs = DB::table('follow_pipes')->select(
            'follow_pipes.*',
            'follow_pipes.id as id_f',
            'follow_pipes.created_at as created_ats',
            'follow_pipes.note as notes',
            'users.*',
            'lead_mains.*',
            'lead_mains.id as id_q',
            'pipelines.*',
            'sup_pipelines.*',
            'sup_pipelines.name as sub_namex'
            )
            ->leftjoin('users', 'users.id',  'follow_pipes.upsale_idx')
            ->leftjoin('lead_mains', 'lead_mains.id',  'follow_pipes.read_id')
            ->leftjoin('sup_pipelines', 'sup_pipelines.id',  'follow_pipes.sub_pipe_id')
            ->leftjoin('pipelines', 'pipelines.id',  'sup_pipelines.pipe_id')
            ->orderBy('follow_pipes.follow_pipes_status', 'asc')
            ->orderBy('follow_pipes.created_at', 'desc')
            ->paginate(30);

           // dd($objs);

           $user = User::all();

        return view('admin.crm_lead_follow.index', compact('objs', 'count', 'user'));
    }

    public function api_post_status_follow(Request $request){

        $user = follow_pipe::findOrFail($request->user_id);

              if($user->follow_pipes_status == 1){
                  $user->follow_pipes_status = 0;
              } else {
                  $user->follow_pipes_status = 1;
              }

              $user->save();

      return response()->json([
      'data' => [
        'success' => 200,
        'stat' => $user->follow_pipes_status,
      ]
    ]);

     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function add_following_pipe(Request $request, $id)
    {
        $this->validate($request, [
            'date_follow' => 'required',
            'sub_pipe_id' => 'required',
        ]);

            $obj = new follow_pipe();
            $obj->user_id_add = Auth::user()->id;
            $obj->upsale_idx = $request->upsale_idx;
            $obj->read_id = $id;
            $obj->sub_pipe_id = $request->sub_pipe_id;
            $obj->note = $request->note;
            $obj->cus_id = $request->cus_id;
            $obj->date_follow = $request->date_follow;
            $obj->save();

            $objs = lead_main::find($id);
           $objs->end_date = $request->date_follow;
           $objs->save();

        //
        return redirect(url('admin/crm_lead_list_view/'.$id))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
