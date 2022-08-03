@extends('adminlte::page')

@section('title', 'Vortex GED')

@section('content_header')
    <h1>Cadastro de documentos</h1>
@stop

@section('content')

       @php

        $token = \Illuminate\Support\Str::random(32);

        @endphp

    <form action="{{route('docs.salvar')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}

        <label for="name">Nome do documento</label>
        <input type="text" name="nomeDocumento" required autocomplete="off" class="form-control">

        <label for="name">Validade</label>
        <input type="date" name="validade" required autocomplete="off" class="form-control">

        <div class="form-group">
            <label for="arquivo">Arquivo</label>
            <input type="file" required class="form-control-file" name="arquivo">
        </div>

        <input type="hidden" value="Aguardando" name="status">
        <input type="hidden" value="{{$token}}" name="token">

        <input type="submit" class="btn btn-primary float-right" value="Salvar">
    </form>

@stop

