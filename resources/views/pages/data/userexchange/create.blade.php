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
                    <h3 class="box-title">Create User Exchange</h3>
                </div>
                {{ Form::open(array('url' => URL::to('/data/userexchange/store',[],null))) }}
                <form role="form">
                    <div class="box-body">
                        <a style="color:red">{{ Html::ul($errors->all()) }}</a>
                        <div class="form-group">
                            {{ Form::label('UserID', 'UserID') }}
                            {{ Form::select('UserID', $users, null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('ExchangeID', 'ExchangeID') }}
                            {{ Form::select('ExchangeID', $exchanges, null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Username', 'Username') }}
                            {{ Form::text('Username', null, array('class' => 'form-control underline','placeholder'=>"Username")) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('APIKey', 'APIKey') }}
                            {{ Form::text('APIKey', null, array('class' => 'form-control underline','placeholder'=>"APIKey")) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('APISecret', 'APISecret') }}
                            {{ Form::text('APISecret', null, array('class' => 'form-control underline','placeholder'=>"APISecret")) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Passphrase', 'Passphrase') }}
                            {{ Form::text('Passphrase', null, array('class' => 'form-control underline','placeholder'=>"Passphrase")) }}
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
