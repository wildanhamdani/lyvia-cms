<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Roles;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.user.index');
    }

    public function create()
    {
        $role = Roles::select('id', 'name')
            ->orderBy('roles.id')
            ->get();

        $roles = [];
        foreach ($role as $key => $value) {
            $roles[$value->id] = $value->name;
        }

        return view('pages.admin.user.create')->with(['roles' => $roles]);
    }

    public function edit($id)
    {
        $user = User::leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
            ->leftjoin('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('users.id as id',
                'users.name as name',
                'users.email as email',
                'users.mobile as mobile',
                'users.telegram_username as telegram_username',
                'users.telegram_chatid as telegram_chatid',
                'roles.id as roles_id')
            ->where('users.id',$id)
            ->take(1)
            ->get();

        //dd($user);

        $role = Roles::select('id', 'name')
            ->orderBy('roles.id')
            ->get();

        $roles = [];
        foreach ($role as $key => $value) {
            $roles[$value->id] = $value->name;
        }

        return view('pages.admin.user.edit')
            ->with([
                'user' => $user[0],
                'roles' => $roles
            ]);
    }

    public function update($id)
    {

        $input = Input::all();

        $rules = array(
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required|numeric',
            //'roles' => 'required|numeric'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to('/admin/user/'.$id.'/edit')->withErrors($validator)
                ->withInput($input)->with('error_code', 100);
        } else {
            $data = User::find($id);
            $data->name = Input::get('name');
            $data->email = Input::get('email');
            $data->password = bcrypt(Input::get('password'));
            $data->mobile = Input::get('mobile');
            $data->telegram_username = Input::get('telegram_username');
            $data->telegram_chatid = Input::get('telegram_chatid');
            $data->save();

            $roles = Roles::where('roles.id', '=', Input::get('id_role'))->first();
            $data->detachRoles($data->roles);
            $data->attachRole($roles);

            return Redirect::to('/admin/user');
        }
    }

    public function store()
    {

        $input = Input::all();

        $rules = array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'mobile' => 'required|numeric',
            //'roles' => 'required|numeric'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to('/admin/user/create')->withErrors($validator)
                ->withInput($input)->with('error_code', 100);
        } else {
            $data = new User();
            $data->name = Input::get('name');
            $data->email = Input::get('email');
            $data->password = bcrypt(Input::get('password'));
            $data->mobile = Input::get('mobile');
            $data->telegram_username = Input::get('telegram_username');
            $data->telegram_chatid = Input::get('telegram_chatid');
            $data->save();

            $roles = Roles::where('roles.id', '=', Input::get('id_role'))->first();
            $data->attachRole($roles);

            return Redirect::to('/admin/user');
        }
    }

}
