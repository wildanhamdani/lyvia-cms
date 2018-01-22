@extends('adminlte::page')

@section('title', 'LYVIA')

@section('content_header')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8"></div>
        <div class="col-md-2"></div>

    </div>
@stop

@section('content')

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Job</h3>
                </div>
                {{ Form::open(array('url' => URL::to('/job/job/update/'.$data->JobID,[],null))) }}
                <form role="form">
                    <div class="box-body">
                        <a style="color:red">{{ Html::ul($errors->all()) }}</a>
                        <div class="form-group">
                            {{ Form::label('UserExchangeID', 'UserExchangeID') }}
                            {{ Form::select('UserExchangeID', $exchanges, $data->UserExchangeID, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Name', 'Name') }}
                            {{ Form::text('Name', $data->Name, array('class' => 'form-control underline','placeholder'=>"Name")) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Buying_Username', 'Buying_Username') }}
                            {{ Form::select('Buying_Username', $users, $data->Buying_Username, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Selling_Username', 'Selling_Username') }}
                            {{ Form::select('Selling_Username', $users, $data->Selling_Username, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Buying_Currency', 'Buying_Currency') }}
                            {{ Form::select('Buying_Currency', $currencies, $data->Buying_Currency, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Selling_Currency', 'Selling_Currency') }}
                            {{ Form::select('Selling_Currency', $currencies, $data->Selling_Currency, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Buying_Symbol', 'Buying_Symbol') }}
                            {{ Form::select('Buying_Symbol', $symbols, $data->Buying_Symbol, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Selling_Symbol', 'Selling_Symbol') }}
                            {{ Form::select('Selling_Symbol', $symbols, $data->Selling_Symbol, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Base_Currency', 'Base_Currency') }}
                            {{ Form::select('Base_Currency', $currencies, $data->Base_Currency, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Transaction_Block', 'Transaction_Block') }}
                            {{ Form::text('Transaction_Block', $data->Transaction_Block, array('class' => 'form-control underline','placeholder'=>"Name")) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Transaction_Amount', 'Transaction_Amount') }}
                            {{ Form::text('Transaction_Amount', $data->Transaction_Amount, array('class' => 'form-control underline','placeholder'=>"Name")) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Spread_Target', 'Spread_Target') }}
                            {{ Form::text('Spread_Target', $data->Spread_Target, array('class' => 'form-control underline','placeholder'=>"Name")) }}
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

@stop

@section('js')
    @parent

@stop
