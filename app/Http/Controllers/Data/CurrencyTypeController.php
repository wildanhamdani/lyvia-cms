<?php

namespace App\Http\Controllers\Data;

use App\CurrencyType;
use App\DataTables\CurrencyTypeDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CurrencyTypeController extends Controller
{
    public function index(CurrencyTypeDataTable $dataTable)
    {
        return $dataTable->render('pages.data.currencytype.index');
    }

    public function create()
    {
        return view('pages.data.currencytype.create');
    }

    public function edit($CurrencyTypeID)
    {
        $data = CurrencyType::where('CurrencyTypeID',$CurrencyTypeID)->first();

        return view('pages.data.currencytype.edit')->with(['data' => $data]);
    }

    public function update($CurrencyTypeID)
    {

        $input = Input::all();

        $rules = array(
            'name' => 'required'
            //'roles' => 'required|numeric'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to('/data/currencytype/'.$CurrencyTypeID.'/edit')->withErrors($validator)
                ->withInput($input)->with('error_code', 100);
        } else {
            $data = CurrencyType::where('CurrencyTypeID',$CurrencyTypeID)->update([
                'Name' => Input::get('name')
            ]);

            return Redirect::to('/data/currencytype');
        }
    }

    public function store(){

        $input = Input::all();

        $rules = array(
            'name' => 'required',
            //'roles' => 'required|numeric'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to('/data/currencytype/create')->withErrors($validator)
                ->withInput($input)->with('error_code', 100);
        } else {
            $data = new CurrencyType();
            $data->Name = Input::get('name');
            $data->save();

            return Redirect::to('/data/currencytype');
        }

    }
}
