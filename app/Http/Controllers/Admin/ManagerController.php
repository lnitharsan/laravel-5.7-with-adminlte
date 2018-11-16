<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use jeremykenedy\LaravelRoles\Models\Role;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $admin_user = Admin::orderBy('id', 'ASC')->get();
        $roles = Role::orderBy('id', 'Asc')->get();

        $admin = new Admin();

        return view('admin.manager.index', compact('admin_user', 'admin', 'roles'));
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
        $admin = Admin::where('email', $request->email)->first();

        if(empty($admin)){
            $admin = new Admin();
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = bcrypt($request->password);
            $admin->save();

            if(!empty($request->role_id)){
                try {
                    foreach ($request->get('role_id') as $role_id) $admin->attachRole($role_id);
                    $message = 'Admin user data has been created & Role assigned by user.';
                }catch (QueryException $exception) {
                    $errorInfo = 'Role user name already created';
                }

                if(isset($message)){
                    return redirect('admin/managers')->with('success', $message);
                }elseif(isset($errorInfo)){
                    return redirect('admin/managers')->with('error', $errorInfo);
                }
            }else {
                return redirect('admin/managers')->with('success', 'Admin user data has been created');
            }
        }else{
            return redirect('admin/managers')->with('error', 'Admin user email already used');
        }
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
        //View
        $admin_user = Admin::orderBy('id', 'ASC')->get();
        $roles = Role::orderBy('id', 'Asc')->get();

        //Edit
        $admin = Admin::find($id);
        $role_admin = $admin->roles->pluck('id')->toArray();

        return view('admin.manager.index', compact('admin_user', 'admin', 'roles', 'role_admin'));
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
        $admin = Admin::where('email', '=', $request->email)->where( 'id', '!=', $id)->first();

        if(empty($admin)){
            $admin = Admin::find($id);
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = bcrypt($request->password);
            $admin->save();

            $admin->detachAllRoles();


            if(!empty($request->role_id)){
                try {
                    foreach ($request->get('role_id') as $role_id) $admin->attachRole($role_id);
                    $message = 'Admin user data has been created & Role assigned by user.';
                }catch (QueryException $exception) {
                    $errorInfo = 'Role user name already created';
                }

                if(isset($message)){
                    return redirect('admin/manager')->with('success', $message);
                }elseif(isset($errorInfo)){
                    return redirect('admin/manager')->with('error', $errorInfo);
                }
            }else {
                return redirect('admin/manager')->with('success', 'Admin user data has been updated');
            }
        }else{
            return redirect('admin/manager')->with('error', 'Admin user email already used');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role_admin = Admin::find($id);

        if($role_admin && $role_admin->delete()){
            return redirect('admin/managers')->with('success', 'Admin user data has been deleted');
        }

        return redirect('admin/managers')->with('error', 'Admin user data already used.');
    }
}
