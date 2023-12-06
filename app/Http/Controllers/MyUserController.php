<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\role_user;
use Illuminate\Support\Facades\Hash;
use Auth;
use Redirect;
use DataTables;

class MyUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        if(Auth::user()->roles[0]['name'] === 'superadmin'){

            $objs = DB::table('users')->select(
                'users.*',
                'users.id as id_q',
                'users.name as names',
                'users.status as status1',
                'users.created_at as created_ats',
                'role_user.*',
                'roles.*',
                'roles.name as name1',
                )
                ->leftjoin('role_user', 'role_user.user_id',  'users.id')
                ->leftjoin('roles', 'roles.id',  'role_user.role_id')
                ->orderby('users.created_at', 'desc')
                ->paginate(15);

        }else{

            $objs = DB::table('users')->select(
                'users.*',
                'users.id as id_q',
                'users.name as names',
                'users.status as status1',
                'users.created_at as created_ats',
                'role_user.*',
                'roles.*',
                'roles.name as name1',
                )
                ->leftjoin('role_user', 'role_user.user_id',  'users.id')
                ->leftjoin('roles', 'roles.id',  'role_user.role_id')
                ->where('role_user.role_id', 3)
                ->orderby('users.created_at', 'desc')
                ->paginate(15);

        }
        

            $objs->setPath('');

        return view('admin.user_manager.index', compact('objs'));
    }


    public function get_user_manager(Request $request){


        if ($request->ajax()) {

            if(Auth::user()->roles[0]['name'] === 'superadmin'){

                $data = User::select(
                    'users.*',
                    'users.id as id_q',
                    'users.name as names',
                    'users.status as status1',
                    'users.created_at as created_ats',
                    'role_user.role_id',
                    'roles.name as name1',
                    )
                    ->leftjoin('role_user', 'role_user.user_id',  'users.id')
                    ->leftjoin('roles', 'roles.id',  'role_user.role_id')
                    ->orderby('users.created_at', 'desc');

            }else{

                $data = User::select(
                    'users.*',
                    'users.id as id_q',
                    'users.name as names',
                    'users.status as status1',
                    'users.created_at as created_ats',
                    'role_user.role_id',
                    'roles.name as name1',
                    )
                    ->leftjoin('role_user', 'role_user.user_id',  'users.id')
                    ->leftjoin('roles', 'roles.id',  'role_user.role_id')
                    ->where('role_user.role_id', 3)
                    ->orderby('users.created_at', 'desc');

            }
  
            if ($request->filled('search_name')) {
                $data = $data->where('users.name', 'like', "%" . $request->search_name . "%");
            }
          //  dd($data);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="'.url('admin/user_manager/'.$row->id_q.'/edit').'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                </svg>
                            </span>
                        </a>
                        <a href="'.url('api/del_MyUser/'.$row->id_q).'" onclick="return confirm("คุณต้องการลบข้อมูลนี้ใช่ไหม?")" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
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
                    ->addColumn('user', function($row){
       
                        $btn = '<div class="d-flex align-items-center">
                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                        <div class="symbol-label">
                                            <img src="'.url('images/dark-app/avatar/'.$row->avatar).'" alt="'.$row->names.'" class="w-100" />
                                        </div>
                                </div>
                                <div class="ms-5">
                                    <a class="text-gray-800 text-hover-primary fs-5 fw-bold">'.$row->names.'</a>
                                </div>
                            </div>';
  
                        return $btn;
                })
                    ->rawColumns(['action', 'user'])
                    ->make(true);
        }
            
        return view('admin.user_manager.index');
    }

    public function users_search(Request $request){

        $this->validate($request, [
            'search' => 'required'
          ]);
          $search = $request->get('search');

          if(Auth::user()->roles[0]['name'] === 'superadmin'){

          $objs = DB::table('users')->select(
            'users.*',
            'users.id as id_q',
            'users.name as names',
            'users.status as status1',
            'users.created_at as created_ats',
            'role_user.*',
            'roles.*',
            'roles.name as name1',
            )
            ->leftjoin('role_user', 'role_user.user_id',  'users.id')
            ->leftjoin('roles', 'roles.id',  'role_user.role_id')
            ->where('users.fname', 'like', "%$search%")
            ->orderby('users.created_at', 'desc')
            ->paginate(15);

          }else{

            $objs = DB::table('users')->select(
                'users.*',
                'users.id as id_q',
                'users.name as names',
                'users.status as status1',
                'users.created_at as created_ats',
                'role_user.*',
                'roles.*',
                'roles.name as name1',
                )
                ->leftjoin('role_user', 'role_user.user_id',  'users.id')
                ->leftjoin('roles', 'roles.id',  'role_user.role_id')
                ->where('users.fname', 'like', "%$search%")
                ->where('role_user.role_id', 3)
                ->orderby('users.created_at', 'desc')
                ->paginate(15);

          }

            $objs->setPath('');

        return view('admin.user_manager.search', compact(
            'objs',
            'search'
        ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Role = Role::all();
        $data['Role'] = $Role;
        $data['method'] = "post";
        $data['url'] = url('admin/user_manager');
        return view('admin.user_manager.create', $data);
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
            'option2' => 'required',
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        if($request['role'] === null){
            $role = 3;
        }else{
            $role = $request['role'];
        }


            $user = User::create([
                'name' => $request['name'],
                'phone' => $request['phone'],
                'username' => $request['name'],
                'fname' => $request['fname'],
                'avatar' => $request['option2'],
                'code_user' => $request['password'],
                'provider' => 'email',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'is_admin' => 0,
                'password' => Hash::make($request['password']),
            ]);
    
            $objs = Role::where('id', $role)->first();
    
            $user
            ->roles()
            ->attach(Role::where('name', $objs->name)->first());
    
            return redirect(url('admin/user_manager'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

    

        
        
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
        $get_role = DB::table('role_user')->where('user_id',$id)->first();

        if(Auth::user()->roles[0]['name'] === 'admin' && $get_role->role_id === 1){

            return redirect(url('admin/user_manager/'));

        }

            $data['get_role'] = $get_role;
        $objs = User::find($id);
        $data['url'] = url('admin/user_manager/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        $Role = Role::all();
        $data['Role'] = $Role;
        return view('admin.user_manager.edit', $data);

        
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

         //   dd(date("Y-m-d", strtotime($request['startdate'])));

        if($request['role'] === null){
            $role = 3;
        }else{
            $role = $request['role'];
        }

            if($request['password'] == null){

                $this->validate($request, [
                    'option2' => 'required'
                ]);

               

                $objs = User::find($id);
                $objs->name = $request['name'];
                $objs->fname = $request['fname'];
                $objs->username = $request['name'];
                $objs->phone = $request['phone'];
                $objs->avatar = $request['option2'];
                $objs->save();

            }else{

                $this->validate($request, [
                    'option2' => 'required',
                    'name' => 'required',
                    'password' => ['required', 'string', 'min:8', 'confirmed']
                ]);

                $objs = User::find($id);
                $objs->name = $request['name'];
                $objs->fname = $request['fname'];
                $objs->username = $request['name'];
                $objs->phone = $request['phone'];
                $objs->avatar = $request['option2'];
                $objs->code_user = $request['password']; 
                $objs->password = Hash::make($request['password']);
                $objs->save();

            }

           

           DB::table('role_user')
              ->where('user_id', $id)
              ->update(['role_id' => $role]);

              return redirect(url('admin/user_manager/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_MyUser($id)
    {
        //

        if($id !== '1'){

            $obj = User::find($id);
            $obj->delete();

            DB::table('role_user')
            ->where('user_id', $id)
            ->delete();

        }

        

        return redirect(url('admin/user_manager/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
