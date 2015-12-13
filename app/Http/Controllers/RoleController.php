<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use Kamaln7\Toastr\Facades\Toastr;
use Validator;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $roles = Role::all();
        $title = trans('back.pages.roles');
        return view('admin.roles.index', compact('roles', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = trans('back.pages.newRole');
        $permList = $this->permissionList();

        return view('admin.roles.create', compact('title', 'permList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        $title = trans('back.pages.newRole');
        // validate request
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name|min:3|max:10',
            'display_name' => 'required|min:3|max:30',
            'description' => 'required|min:3|max:250',
        ]);

        if ($validator->fails()) {

            Toastr::error(trans('messages.error.msg_validation'), $title);

            return redirect()
                ->route('roles.create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $permissions = $request['permissions'];

            $role = Role::create($request->all());

            if(is_array($permissions) && count($permissions) > 1){
                $role->attachPermissions($permissions);
            }

            Toastr::success(trans('messages.success.newRole'), $title);
            return redirect()->route('roles.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $title = trans('back.pages.roles');
        $role = Role::findOrNew($id);
        $users = $this->usersWithRole($role);
        //$permissions = $role->perms;
        $permList = $this->rolePermissionList($role);

        return view('admin.roles.show', compact('role', 'permList', 'users', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    private function usersWithRole ($role){

        $users = User::all()->filter(function ($item) use ($role){
            return $item->hasRole($role->name);
        });

        return $users;
    }

    private function rolePermissionList ($role){

        $permList = Permission::all()->sortBy('name');
        foreach ($permList as $perm){
            if ($role->hasPermission($perm->name)){
                $perm->checked = true;
            }
        }
        $permList = $permList->groupBy('context')->sortBy('name');
        return $permList;
    }
    private function permissionList (){

        $permList = Permission::all()->sortBy('name');
        $permList = $permList->groupBy('context')->sortBy('name');
        return $permList;
    }
}
