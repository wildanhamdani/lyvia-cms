<?php

namespace App\Http\Controllers\Data;

use App\DataTables\SymbolDataTable;
use App\Http\Controllers\Controller;
use App\Symbol;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SymbolController extends Controller
{
    public function index(SymbolDataTable $dataTable)
    {
        return $dataTable->render('pages.data.symbol.index');
    }

    public function create()
    {
        return view('pages.data.symbol.create');
    }

    public function edit($id)
    {
        $data = Symbol::where('SymbolID',$id)->first();

        return view('pages.data.symbol.edit')->with(['data' => $data]);
    }

    public function update($SymbolID)
    {

        $input = Input::all();

        $rules = array(
            'Symbol' => 'required',
            'Description' => 'required',
            //'roles' => 'required|numeric'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to('/data/symbol/'.$SymbolID.'/edit')->withErrors($validator)
                ->withInput($input)->with('error_code', 100);
        } else {
            $data = Symbol::where('SymbolID',$SymbolID)->update([
                'Symbol' => Input::get('Symbol'),
                'Description' => Input::get('Description')
            ]);

            return Redirect::to('/data/symbol');
        }
    }

    public function store(){

        $input = Input::all();

        $rules = array(
            'Symbol' => 'required',
            'Description' => 'required',
            //'roles' => 'required|numeric'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to('/data/symbol/create')->withErrors($validator)
                ->withInput($input)->with('error_code', 100);
        } else {
            $data = new Symbol();
            $data->Symbol = Input::get('Symbol');
            $data->Description = Input::get('Description');
            $data->save();

            return Redirect::to('/data/symbol');
        }

    }
}
