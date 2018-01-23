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
                    <h3 class="box-title">Create Job</h3>
                </div>
                {{ Form::open(array('url' => URL::to('/job/job/store',[],null))) }}
                <form role="form">
                    <div class="box-body">
                        <a style="color:red">{{ Html::ul($errors->all()) }}</a>
                        <div class="form-group">
                            {{ Form::label('UserExchangeID', 'UserExchangeID') }}
                            {{ Form::select('UserExchangeID', $exchanges, null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Name', 'Name') }}
                            {{ Form::text('Name', null, array('class' => 'form-control underline','placeholder'=>"Name")) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Buying_Username', 'Buying_Username') }}
                            {{ Form::select('Buying_Username', $userexchanges, null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Selling_Username', 'Selling_Username') }}
                            {{ Form::select('Selling_Username', $userexchanges, null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Buying_Currency', 'Buying_Currency') }}
                            {{ Form::select('Buying_Currency', $currencies, null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Selling_Currency', 'Selling_Currency') }}
                            {{ Form::select('Selling_Currency', $currencies, null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Buying_Symbol', 'Buying_Symbol') }}
                            {{ Form::select('Buying_Symbol', $symbols, null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Selling_Symbol', 'Selling_Symbol') }}
                            {{ Form::select('Selling_Symbol', $symbols, null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Base_Currency', 'Base_Currency') }}
                            {{ Form::select('Base_Currency', $currencies, null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Transaction_Block', 'Transaction_Block') }}
                            {{ Form::text('Transaction_Block', null, array('class' => 'form-control underline','placeholder'=>"Name")) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Transaction_Amount', 'Transaction_Amount') }}
                            {{ Form::text('Transaction_Amount', null, array('class' => 'form-control underline','placeholder'=>"Name")) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Spread_Target', 'Spread_Target') }}
                            {{ Form::text('Spread_Target', null, array('class' => 'form-control underline','placeholder'=>"Name")) }}
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
