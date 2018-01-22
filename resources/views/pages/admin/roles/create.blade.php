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
                    <h3 class="box-title">Create User</h3>
                </div>
                {{ Form::open(array('url' => URL::to('/admin/roles/store',[],null))) }}
                <form role="form">
                    <div class="box-body">
                        <div class="box-body">
                            <a style="color:red">{{ Html::ul($errors->all()) }}</a>
                            <div class="form-group">
                                {{ Form::label('name', 'Name') }}
                                {{ Form::text('name', null, array('class' => 'form-control underline','placeholder'=>"")) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('display_name', 'Display Name') }}
                                {{ Form::text('display_name', null, array('class' => 'form-control underline','placeholder'=>"")) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('description', 'Description') }}
                                {{ Form::text('description', null, array('class' => 'form-control underline','placeholder'=>"")) }}
                            </div>
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
