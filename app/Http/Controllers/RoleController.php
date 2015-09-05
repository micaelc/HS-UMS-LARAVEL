<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Kamaln7\Toastr\Facades\Toastr;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $roles = Role::all();
        $title = trans('back.roles');
        return view('admin.roles.list', compact('roles', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $title = trans('back.roles');
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

        $permList = Permission::all()->sortBy('context');

        foreach ($permList as $perm){
            if ($role->hasPermission($perm->name)){
                $perm->checked = true;
            }
        }

        $permList = $permList->groupBy('context');

        return $permList;
    }
}
