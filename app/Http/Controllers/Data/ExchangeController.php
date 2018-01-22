<?php

namespace App\Http\Controllers\Data;

use App\DataTables\ExchangeDataTable;
use App\Exchange;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ExchangeController extends Controller
{
    public function index(ExchangeDataTable $dataTable)
    {
        return $dataTable->render('pages.data.exchange.index');
    }

    public function create()
    {
        return view('pages.data.exchange.create');
    }

    public function edit($id)
    {
        $data = Exchange::where('ExchangeID',$id)->first();

        return view('pages.data.exchange.edit')->with(['data' => $data]);
    }

    public function update($ExchangeID)
    {

        $input = Input::all();

        $rules = array(
            'name' => 'required',
            'ModuleName' => 'required',
            //'roles' => 'required|numeric'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to('/data/exchange/'.$ExchangeID.'/edit')->withErrors($validator)
                ->withInput($input)->with('error_code', 100);
        } else {
            $data = Exchange::where('ExchangeID',$ExchangeID)->update([
                'Name' => Input::get('name'),
                'ModuleName' => Input::get('ModuleName')
            ]);

            return Redirect::to('/data/exchange');
        }
    }

    public function store(){

        $input = Input::all();

        $rules = array(
            'name' => 'required',
            'ModuleName' => 'required',
            //'roles' => 'required|numeric'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to('/data/exchange/create')->withErrors($validator)
                ->withInput($input)->with('error_code', 100);
        } else {
            $data = new Exchange();
            $data->name = Input::get('name');
            $data->ModuleName = Input::get('ModuleName');
            $data->save();

            return Redirect::to('/data/exchange');
        }

    }
}
