@extends('adminlte::page')

@section('title', 'Vortex GED')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$itens->count()}}</h3>
                <p>Docs cadastrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-paste"></i>
            </div>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
