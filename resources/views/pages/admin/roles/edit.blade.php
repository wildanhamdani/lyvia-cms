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
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', $user->name, array('class' => 'form-control underline','placeholder'=>"")) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('display_name', 'Display Name') }}
                            {{ Form::text('display_name', $user->display_name, array('class' => 'form-control underline','placeholder'=>"")) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('description', 'Description') }}
                            {{ Form::text('description', $user->description, array('class' => 'form-control underline','placeholder'=>"")) }}
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
