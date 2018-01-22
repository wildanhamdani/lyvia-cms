<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RolesDataTable;
use App\Http\Controllers\Controller;
use App\Roles;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    public function index(RolesDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.roles.index');
    }

    public function create()
    {
        return view('pages.admin.roles.create');
    }

    public function edit($id)
    {
        $roles = Roles::find($id);

        return view('pages.admin.roles.edit')->with(['roles' => $roles]);
    }

    public function store(){

        $input = Input::all();

        $rules = array(
            'name' => 'required',
            'display_name' => 'required'
            //'roles' => 'required|numeric'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to('/admin/roles/create')->withErrors($validator)
                ->withInput($input)->with('error_code', 100);
        } else {
            $data = new Roles();
            $data->name = Input::get('name');
            $data->display_name = Input::get('display_name');
            $data->description = Input::get('description');
            $data->save();

            return Redirect::to('/admin/roles');
        }
    }
}
