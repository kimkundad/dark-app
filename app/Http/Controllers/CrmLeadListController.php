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
use Response;
use Auth;

class CrmLeadListController extends Controller
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

        return view('admin.crm_lead_status.index', compact('objs'));
    }

    public function view(){

        $count = DB::table('lead_mains')->count();
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
            )
            ->leftjoin('customer_managers', 'customer_managers.id',  'lead_mains.user_id')
            ->leftjoin('sale_contacts', 'sale_contacts.id',  'lead_mains.lead_lists_channels')
            ->leftjoin('pipelines', 'pipelines.id',  'lead_mains.pip_id')
            ->leftjoin('users', 'users.id',  'lead_mains.upsale_id')
            ->leftjoin('sup_pipelines', 'sup_pipelines.id',  'lead_mains.last_sup_pipeline')
            ->where('lead_mains.upsale_id', '!=', 5)
            ->orderBy('lead_mains.id', 'desc')
            ->paginate(15);

           // dd($objs);

            $objs->setPath('');
            $data['objs'] = $objs;

            $pipe = pipeline::get();
            
        
        return view('admin.crm_lead_list.view', compact('objs', 'count', 'pipe'));

    }

    public function waiting_distribute_crm(){

        $count = DB::table('lead_mains')->count();
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
            )
            ->leftjoin('customer_managers', 'customer_managers.id',  'lead_mains.user_id')
            ->leftjoin('sale_contacts', 'sale_contacts.id',  'lead_mains.lead_lists_channels')
            ->leftjoin('pipelines', 'pipelines.id',  'lead_mains.pip_id')
            ->leftjoin('users', 'users.id',  'lead_mains.upsale_id')
            ->leftjoin('sup_pipelines', 'sup_pipelines.id',  'lead_mains.last_sup_pipeline')
            ->where('lead_mains.upsale_id', 5)
            ->orderBy('lead_mains.id', 'desc')
            ->paginate(15);

           // dd($objs);

            $objs->setPath('');
            $data['objs'] = $objs;

            $pipe = pipeline::get();
            
        
        return view('admin.waiting_distribute_crm.index', compact('objs', 'count', 'pipe'));

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
            
        
        return view('admin.all_orders.index', compact('objs', 'count', 'pipe'));

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

            $timeline_check = timeline_pipe::where('lead_main_id', $objs->id_q)->orderBy('id', 'desc')->first();
         

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
                ->where('timeline_pipes.lead_main_id', $objs->id_q)
                ->orderBy('timeline_pipes.id', 'desc')
                ->get();


                $follow_pipes = DB::table('follow_pipes')->select(
                'follow_pipes.*',
                'follow_pipes.id as id_f',
                'follow_pipes.created_at as created_ats',
                'users.*',
                )
                ->leftjoin('users', 'users.id',  'follow_pipes.user_id_add')
                ->where('follow_pipes.read_id', $objs->id_q)
                ->orderBy('follow_pipes.id', 'desc')
                ->get();

                $user = User::all();

        return view('admin.crm_lead_list.edit', compact('objs', 'sup_pipeline', 'pipe', 'lead_list', 'time_line', 'timeline_check', 'follow_pipes', 'user'));

    }


    public function add_change_upsale(Request $request, $id){

        follow_pipe::where('read_id', $id)
        ->update(['upsale_idx' => $request->upsale_id]);

        lead_list::where('lead_main_id', $id)
        ->update(['upsale_id' => $request->upsale_id]);

        lead_main::where('id', $id)
        ->update(['upsale_id' => $request->upsale_id]);

        return redirect(url('admin/crm_lead_list_view/'.$id))->with('edit_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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

        return view('admin.crm_lead_list.edit', compact('objs'));

    }

    public function add_timeline_pipeline(Request $request, $id){

        $this->validate($request, [
            'sub_pipe_id' => 'required'
        ]);

        $sup_pipeline = sup_pipeline::where('id', $request->sub_pipe_id)->first();
        $data_sup_pipeline = sup_pipeline::where('id', $sup_pipeline->id+1)->where('sort', $sup_pipeline->sort+1)->first();
        //dd($data_sup_pipeline);
        //follow_pipe


           $objs = new timeline_pipe();
           $objs->user_id = Auth::user()->id;
           $objs->lead_main_id = $id;
           $objs->sub_pipe_id = $request->sub_pipe_id;
           $objs->note = $request->note;
           $objs->save();

           lead_main::where('id', $id)
           ->update(['last_sup_pipeline' => $request->sub_pipe_id]);

           if($data_sup_pipeline){

            $date = strtotime("+".$sup_pipeline->day." day");

            $obj = new follow_pipe();
            $obj->user_id_add = Auth::user()->id;
            $obj->upsale_idx = $request->upsale_idx;
            $obj->read_id = $id;
            $obj->sub_pipe_id = $data_sup_pipeline->id;
            $obj->note = $request->note;
            $obj->cus_id = $request->cus_id;
            $obj->date_follow = date('Y-m-d' ,$date);
            $obj->save();
           }

           return redirect(url('admin/crm_lead_list_view/'.$id))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

    }

    public function add_new_pipeline_edit(Request $request, $id){

           $objs = lead_main::find($id);
           $objs->pip_id = $request->pipe_id;
           $objs->save();

           return redirect(url('admin/crm_lead_list_view/'.$id))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
    }

    public function change_pipe(Request $request){

           $objs = lead_main::find($request->id);
           $objs->pip_id = $request->pipe;
           $objs->save();

        return response()->json([
            'data' => 'success'
          ]);

    }
}
