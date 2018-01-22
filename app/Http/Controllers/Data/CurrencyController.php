<?php

namespace App\Http\Controllers\Data;

use App\Currency;
use App\CurrencyType;
use App\DataTables\CurrencyDataTable;
use App\Http\Controllers\Controller;
use App\Symbol;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CurrencyController extends Controller
{
    public function index(CurrencyDataTable $dataTable)
    {
        return $dataTable->render('pages.data.currency.index');
    }

    public function create()
    {
        $symbol = Symbol::all();
        $symbols = [];
        foreach ($symbol as $key => $value) {
            $symbols[$value->SymbolID] = $value->Symbol;
        }
        $type = CurrencyType::all();
        $types = [];
        foreach ($type as $key => $value) {
            $types[$value->CurrencyTypeID] = $value->Name;
        }

        return view('pages.data.currency.create')->with([
            'symbols' => $symbols,
            'types' => $types
        ]);
    }

    public function edit($id)
    {
        $data = Currency::where('CurrencyID',$id)->first();

        $symbol = Symbol::all();
        $symbols = [];
        foreach ($symbol as $key => $value) {
            $symbols[$value->SymbolID] = $value->Symbol;
        }

        $type = CurrencyType::all();
        $types = [];
        foreach ($type as $key => $value) {
            $types[$value->CurrencyTypeID] = $value->Name;
        }

        return view('pages.data.currency.edit')->with([
            'data' => $data,
            'symbols' => $symbols,
            'types' => $types]);
    }

    public function update($CurrencyID)
    {

        $input = Input::all();

        $rules = array(
            'Symbol' => 'required',
            'Type' => 'required|numeric',
            'Name' => 'required',
            //'roles' => 'required|numeric'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to('/data/currency/'.$CurrencyID.'/edit')->withErrors($validator)
                ->withInput($input)->with('error_code', 100);
        } else {
            $data = Currency::where('CurrencyID',$CurrencyID)->update([
                'Symbol' => Input::get('Symbol'),
                'Type' => Input::get('Type'),
                'Name' => Input::get('Name'),
            ]);

            return Redirect::to('/data/currency');
        }
    }

    public function store(){

        $input = Input::all();

        $rules = array(
            'Symbol' => 'required',
            'Type' => 'required|numeric',
            'Name' => 'required',
            //'roles' => 'required|numeric'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to('/data/currency/create')->withErrors($validator)
                ->withInput($input)->with('error_code', 100);
        } else {
            $data = new Currency();
            $data->Symbol = Input::get('Symbol');
            $data->Type = Input::get('Type');
            $data->Name = Input::get('Name');
            $data->save();

            return Redirect::to('/data/currency');
        }

    }
}
