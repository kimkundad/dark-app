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
