<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pipeline;
use App\Models\sup_pipeline;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PipeLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = pipeline::paginate(30);
        $objs->setPath('');
        $data['objs'] = $objs;
        return view('admin.pipeline.index', compact('objs'));
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
        $data['url'] = url('admin/pipeline');
        return view('admin.pipeline.create', $data);
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
        // dd($request->kt_docs_repeater_basic[0]['step_pipe']);
        // dd(count($request->kt_docs_repeater_basic));
        $this->validate($request, [
            'pipe_name' => 'required',
        ]);

        $status = 0;
        if(isset($request['status'])){
            if($request['status'] == 1){
                $status = 1;
            }
        }
        
           $objs = new pipeline();
           $objs->pipe_name = $request['pipe_name'];
           $objs->status = $status;
           $objs->save();
           $objs->id;

        if (count($request->kt_docs_repeater_basic) > 0) {
            for ($i = 0; $i < count($request->kt_docs_repeater_basic); $i++) {
              $pipeline[] = [
                  'name' => $request->kt_docs_repeater_basic[$i]['step_pipe'],
                  'sort' => $i,
                  'pipe_id' => $objs->id
              ];
            }
        }
        sup_pipeline::insert($pipeline);
        
           return redirect(url('admin/pipeline'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
        $objs = pipeline::find($id);

        $sub = DB::table('sup_pipelines')
            ->where('pipe_id', $id)
            ->orderBy('sort', 'asc')
            ->get();


        $data['url'] = url('admin/pipeline/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        $data['sub'] = $sub;
        return view('admin.pipeline.edit', $data);
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
            'pipe_name' => 'required',
        ]);

        $status = 0;
        if(isset($request['status'])){
            if($request['status'] == 1){
                $status = 1;
            }
        }

           $objs = pipeline::find($id);
           $objs->pipe_name = $request['pipe_name'];
           $objs->status = $status;
           $objs->save();
           $objs->id;

           

        if (count($request->kt_docs_repeater_basic) > 0) {
            for ($i = 0; $i < count($request->kt_docs_repeater_basic); $i++) {
              $pipeline[] = [
                  'name' => $request->kt_docs_repeater_basic[$i]['step_pipe'],
                  'sort' => $i,
                  'pipe_id' => $id
              ];
            }
        }
        sup_pipeline::insert($pipeline);
        
           return redirect(url('admin/pipeline'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
