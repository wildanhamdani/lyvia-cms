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
                    <h3 class="box-title">Edit Symbol</h3>
                </div>
                {{ Form::open(array('url' => URL::to('/data/symbol/update/'.$data->SymbolID,[],null))) }}
                <form role="form">
                    <div class="box-body">
                        <a style="color:red">{{ Html::ul($errors->all()) }}</a>
                        <div class="form-group">
                            {{ Form::label('Symbol', 'Symbol') }}
                            {{ Form::text('Symbol', $data->Symbol, array('class' => 'form-control underline','placeholder'=>"email")) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Description', 'Description') }}
                            {{ Form::text('Description', $data->Description, array('class' => 'form-control underline','placeholder'=>"email")) }}
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
