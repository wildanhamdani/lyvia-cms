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
                    <h3 class="box-title">Edit {{$user->name}}</h3>
                </div>
                {{ Form::open(array('url' => URL::to('/admin/user/update/'.$user->id,[],null))) }}
                <form role="form">
                    <div class="box-body">
                        <a style="color:red">{{ Html::ul($errors->all()) }}</a>
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', $user->name, array('class' => 'form-control underline','placeholder'=>"email")) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::text('email', $user->email, array('class' => 'form-control underline','placeholder'=>"email")) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('mobile', 'Mobile') }}
                            {{ Form::text('mobile', $user->mobile, array('class' => 'form-control underline','placeholder'=>"email")) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('telegram_username', 'Telegram Username') }}
                            {{ Form::text('telegram_username', $user->telegram_username, array('class' => 'form-control underline','placeholder'=>"email")) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('telegram_chatid', 'Telegram ChatID') }}
                            {{ Form::text('telegram_chatid', $user->telegram_chatid, array('class' => 'form-control underline','placeholder'=>"email")) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('id_role', 'Roles') }}
                            {{ Form::select('id_role', $roles, $user->roles_id, array('class' => 'form-control')) }}
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
