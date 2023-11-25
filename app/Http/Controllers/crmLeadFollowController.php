<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\follow_pipe;
use Response;
use Auth;

class crmLeadFollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            ->orderBy('follow_pipes.id', 'desc')
            ->paginate(30);

           // dd($objs);

        return view('admin.crm_lead_follow.index', compact('objs', 'count'));
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
