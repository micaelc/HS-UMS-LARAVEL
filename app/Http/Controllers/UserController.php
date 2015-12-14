<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Hash;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Password;
use Response;
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

        return view('admin.users.index', compact('title', 'users'));

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
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $title = trans('back.pages.newUser');
        $request['status'] = false;
        $request['password'] = Hash::make(Str::random(15));

        // validate request
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email',
            'firstName' => 'required|min:3|max:30',
            'lastName' => 'required|min:3|max:30',
            'role_id' => 'required',
        ]);

        if ($validator->fails()) {

            Toastr::error(trans('messages.error.msg_validation'), $title);

            return redirect()
                ->route('users.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = User::create($request->all());
            $user->attachRole(Role::findOrNew($request->role_id));

            // Send e-mail to setup password
            $response = Password::sendResetLink($request->only('email'), function (Message $message) {
                $message->subject(trans('email.password.defineSubject'));
            });
            switch ($response) {
                case Password::RESET_LINK_SENT:
                    Toastr::success(trans('messages.success.definePasswordEmail'), $title);
                    break;
                case Password::INVALID_USER:
                    Toastr::warning(trans('messages.warning.definePasswordEmail'), $title);
                    break;
            }

            Toastr::success(trans('messages.success.newUser'), $title);
            return redirect()->route('users.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public
    function show($id)
    {
        $title = trans('back.pages.users');
        $user = User::with('roles')->findOrFail($id);

        return view('admin.users.show', compact('title', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public
    function edit($id)
    {
        $title = trans('back.pages.editUser');
        $roles = Role::all(['display_name', 'id'])->lists('display_name', 'id');
        $user = User::findOrNew($id);
        $role = $user->roles()->get()->first();
        return view('admin.users.edit', compact('user', 'title', 'roles', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public
    function update(Request $request, $id)
    {
        $title = trans('back.pages.editUser');

        $user = User::findOrNew($id);

        $rules = [
            'email' => 'required|unique:users,email,' . $id,
            'firstName' => 'required|min:3|max:30',
            'lastName' => 'required|min:3|max:30',
            'role_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('users.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $user->update($request->all(), $id);
            $this->detachAllRoles($user);
            $user->attachRole(Role::findOrNew($request->role_id));

            Toastr::success(trans('messages.success.updatedUser'), $title);
            return redirect()->route('users.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public
    function destroy($id)
    {
        //
    }

    /**
     * @return mixed
     */
    public function postActivate()
    {
        $id = Input::get('userId');

        $user = User::findOrNew($id);

        if ($user->status) {
            $user->status = false;
            $user->save();
            Toastr::success(trans('messages.success.deactivated'), trans('back.headers.users'));
        } else {
            $user->status = true;
            $user->save();
            Toastr::success(trans('messages.success.activated'), trans('back.headers.users'));
        }

        return Response::json(['success' => 'Success']);
    }

    /**
     * Function do remove all attached roles to a given user
     *
     * @param $user
     */
    protected function detachAllRoles($user){
        $roles = Role::all();
        foreach ($roles as $role) {
            $user->detachRole($role);
        }
    }

}
