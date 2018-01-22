@extends('adminlte::page')

@section('title', 'LYVIA')

@section('content_header')
    <h1>Data</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">User Exchange Table</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive no-padding">
                        {!! $dataTable->table(['class' => 'table table-hover'], true)  !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    @parent

    {!! $dataTable->scripts() !!}

@stop
