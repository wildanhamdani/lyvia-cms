<?php

namespace App\Http\Controllers\Data;

use App\DataTables\UserExchangeDataTable;
use App\Exchange;
use App\Http\Controllers\Controller;
use App\User;
use App\UserExchange;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserExchangeController extends Controller
{
    public function index(UserExchangeDataTable $dataTable)
    {
        return $dataTable->render('pages.data.userexchange.index');
    }

    public function create()
    {
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

        return view('pages.data.userexchange.create')->with([
            'users' => $users,
            'exchanges' => $exchanges
        ]);
    }

    public function edit($id)
    {
        $data = UserExchange::where('UserExchangeID',$id)->first();

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

        return view('pages.data.userexchange.edit')->with([
            'data' => $data,
            'users' => $users,
            'exchanges' => $exchanges
        ]);
    }

    public function update($UserExchangeID)
    {

        $input = Input::all();

        $rules = array(
            'UserID' => 'required',
            'ExchangeID' => 'required',
            'Username' => 'required',
            'APIKey' => 'required',
            'APISecret' => 'required',
            'Passphrase' => 'required'
            //'roles' => 'required|numeric'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to('/data/userexchange/'.$UserExchangeID.'/edit')->withErrors($validator)
                ->withInput($input)->with('error_code', 100);
        } else {
            $data = UserExchange::where('ExchangeID',$UserExchangeID)->update([
                'UserID' => Input::get('UserID'),
                'ExchangeID' => Input::get('ExchangeID'),
                'Username' => Input::get('Username'),
                'APIKey' => Input::get('APIKey'),
                'APISecret' => Input::get('APISecret'),
                'Passphrase' => Input::get('Passphrase')
            ]);

            return Redirect::to('/data/userexchange');
        }
    }

    public function store(){

        $input = Input::all();

        $rules = array(
            'UserID' => 'required',
            'ExchangeID' => 'required|numeric',
            'Username' => 'required',
            'APIKey' => 'required',
            'APISecret' => 'required',
            'Passphrase' => 'required'
            //'roles' => 'required|numeric'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to('/data/userexchange/create')->withErrors($validator)
                ->withInput($input)->with('error_code', 100);
        } else {
            $data = new UserExchange();
            $data->UserID = Input::get('UserID');
            $data->ExchangeID = Input::get('ExchangeID');
            $data->Username = Input::get('Username');
            $data->APIKey = Input::get('APIKey');
            $data->APISecret = Input::get('APISecret');
            $data->Passphrase = Input::get('Passphrase');
            $data->CreatedBy = Auth::user()->id;
            $data->save();

            return Redirect::to('/data/userexchange');
        }

    }
}
