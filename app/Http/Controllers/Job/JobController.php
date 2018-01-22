<?php

namespace App\Http\Controllers\Job;

use App\Currency;
use App\DataTables\JobDataTable;
use App\Exchange;
use App\Http\Controllers\Controller;
use App\Job;
use App\Symbol;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function index(JobDataTable $dataTable)
    {
        return $dataTable->render('pages.job.job.index');
    }

    public function create()
    {

        $symbol = Symbol::all();
        $symbols = [];
        foreach ($symbol as $key => $value) {
            $symbols[$value->SymbolID] = $value->Symbol;
        }
        $currency = Currency::all();
        $currencies = [];
        foreach ($currency as $key => $value) {
            $currencies[$value->CurrencyID] = $value->Name;
        }

        $user = User::all();
        $users = [];
        foreach ($user as $key => $value) {
            $users[$value->id] = $value->name;
        }

        $exchange = Exchange::all();
        $exchanges = [];
        foreach ($exchange as $key => $value) {
            $exchanges[$value->ExchangeID] = $value->Name;
        }


        return view('pages.job.job.create')->with([
            'symbols' => $symbols,
            'currencies' => $currencies,
            'users' => $users,
            'exchanges' => $exchanges
        ]);
    }

    public function edit($id)
    {
        $data = Job::where('JobID', $id)->first();

        $symbol = Symbol::all();
        $symbols = [];
        foreach ($symbol as $key => $value) {
            $symbols[$value->SymbolID] = $value->Symbol;
        }
        $currency = Currency::all();
        $currencies = [];
        foreach ($currency as $key => $value) {
            $currencies[$value->CurrencyID] = $value->Name;
        }

        $user = User::all();
        $users = [];
        foreach ($user as $key => $value) {
            $users[$value->id] = $value->name;
        }

        $exchange = Exchange::all();
        $exchanges = [];
        foreach ($exchange as $key => $value) {
            $exchanges[$value->ExchangeID] = $value->Name;
        }

        return view('pages.job.job.edit')->with([
            'data' => $data,
            'symbols' => $symbols,
            'currencies' => $currencies,
            'users' => $users,
            'exchanges' => $exchanges
        ]);
    }

    public function update($JobID)
    {

        $input = Input::all();

        $rules = array(
            'UserExchangeID' => 'required|numeric',
            'Name' => 'required',
            'Buying_Username' => 'required|numeric',
            'Selling_Username' => 'required|numeric',
            'Buying_Currency' => 'required|numeric',
            'Selling_Currency' => 'required|numeric',
            'Buying_Symbol' => 'required|numeric',
            'Selling_Symbol' => 'required|numeric',
            'Base_Currency' => 'required|numeric',
            'Transaction_Block' => 'required|numeric',
            'Transaction_Amount' => 'required|numeric',
            'Spread_Target' => 'required|numeric'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to('/job/job/'.$JobID.'/edit')->withErrors($validator)
                ->withInput($input)->with('error_code', 100);
        } else {
            $data = Job::where('JobID',$JobID)->update([
                'UserExchangeID' => Input::get('UserExchangeID'),
                'Name' => Input::get('Name'),
                'Buying_Username' => Input::get('Buying_Username'),
                'Selling_Username' => Input::get('Selling_Username'),
                'Buying_Currency' => Input::get('Buying_Currency'),
                'Selling_Currency' => Input::get('Selling_Currency'),
                'Buying_Symbol' => Input::get('Buying_Symbol'),
                'Selling_Symbol' => Input::get('Selling_Symbol'),
                'Base_Currency' => Input::get('Base_Currency'),
                'Transaction_Block' => Input::get('Transaction_Block'),
                'Transaction_Amount' => Input::get('Transaction_Amount'),
                'Spread_Target' => Input::get('Spread_Target'),
            ]);

            return Redirect::to('/job/job');
        }
    }

    public function store()
    {

        $input = Input::all();

        $rules = array(
            'UserExchangeID' => 'required|numeric',
            'Name' => 'required',
            'Buying_Username' => 'required|numeric',
            'Selling_Username' => 'required|numeric',
            'Buying_Currency' => 'required|numeric',
            'Selling_Currency' => 'required|numeric',
            'Buying_Symbol' => 'required|numeric',
            'Selling_Symbol' => 'required|numeric',
            'Base_Currency' => 'required|numeric',
            'Transaction_Block' => 'required|numeric',
            'Transaction_Amount' => 'required|numeric',
            'Spread_Target' => 'required|numeric',

            //'roles' => 'required|numeric'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to('/job/job/create')->withErrors($validator)
                ->withInput($input)->with('error_code', 100);
        } else {
            $data = new Job();
            $data->UserExchangeID = Input::get('UserExchangeID');
            $data->Name = Input::get('Name');
            $data->Buying_Username = Input::get('Buying_Username');
            $data->Selling_Username = Input::get('Selling_Username');
            $data->Buying_Currency = Input::get('Buying_Currency');
            $data->Selling_Currency = Input::get('Selling_Currency');
            $data->Buying_Symbol = Input::get('Buying_Symbol');
            $data->Selling_Symbol = Input::get('Selling_Symbol');
            $data->Base_Currency = Input::get('Base_Currency');
            $data->Transaction_Block = Input::get('Transaction_Block');
            $data->Transaction_Amount = Input::get('Transaction_Amount');
            $data->Spread_Target = Input::get('Spread_Target');
            $data->CreatedBy = Auth::user()->id;
            $data->save();

            return Redirect::to('/job/job');
        }

    }
}
