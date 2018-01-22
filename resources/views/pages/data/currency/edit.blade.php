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
                    <h3 class="box-title">Edit Currency</h3>
                </div>
                {{ Form::open(array('url' => URL::to('/data/currency/update/'.$data->CurrencyID,[],null))) }}
                <form role="form">
                    <div class="box-body">
                        <a style="color:red">{{ Html::ul($errors->all()) }}</a>
                        <div class="form-group">
                            {{ Form::label('Symbol', 'Symbol') }}
                            {{ Form::select('Symbol', $symbols, $data->Symbol, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Type', 'Type') }}
                            {{ Form::select('Type', $types, $data->Type, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Name', 'Name') }}
                            {{ Form::text('Name', $data->Name, array('class' => 'form-control underline','placeholder'=>"Name")) }}
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
