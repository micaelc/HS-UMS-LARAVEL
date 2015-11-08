<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Toastr;
use Validator;


class UserController extends Controller
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
        $title = trans('back.pages.users');
        $users = User::with('roles')->get();

        return view('admin.users.index', compact('title','users' ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = trans('back.pages.newUser');
        $roles = Role::all(['display_name', 'id'])->lists('display_name', 'id');
        return view('admin.users.create', compact('title', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $title = trans('back.pages.newUser');
        $request['status'] = true;

        // validate request
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email',
            'firstName' => 'required|min:3|max:30',
            'lastName' => 'required|min:3|max:30',
            'role_id' => 'required',
            'password' => 'required|min:4',
            'confirmPassword' => 'same:password',

        ]);

        if ($validator->fails()) {

            Toastr::error(trans('messages.error.msg_validation'), $title);

            return redirect()
                ->route('users.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = User::create($request->all());
            $user->roles()->attach($request->role_id);
            Toastr::success(trans('messages.success.newUser'), $title);
            return redirect()->route('users.index');
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
        $title = trans('back.pages.users');
        $user = User::with('roles')->findOrFail($id);

        return view('admin.users.show', compact('title','user' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $title = trans('back.pages.editUser');
        $roles = Role::all(['display_name', 'id'])->lists('display_name', 'id');
        $user = User::findOrNew($id);
        return view('admin.users.edit', compact('user', 'title', 'roles'));
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
        $user = User::findOrNew($id);

        $rules = [
            'email' => 'required|unique:users,email,' . $id,
            'firstName' => 'required|min:3|max:30',
            'lastName' => 'required|min:3|max:30',
            'role_id' => 'required',
            'password' => 'required|min:4',
            'confirmPassword' => 'same:password',

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('users.create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $user->update($request->all());
            return redirect()->route('users.index');
        }
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
}
