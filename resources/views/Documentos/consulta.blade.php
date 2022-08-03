@extends('adminlte::page')

@section('title', 'Vortex GED')

@section('content_header')
    <h1>Consulta de documentos</h1>
@stop

@section('content')



<table class="table">

    <thead>
    <th>Nome documento</th>
    <th>Validade</th>
    <th>Status</th>
    <th>Token</th>
    <th>Ação</th>
    </thead>
    <tbody>
@foreach($registros as $registro)
      <tr>
          <td>{{$registro->nomeDocumento}}</td>
          <td>{{\Illuminate\Support\Carbon::parse($registro->validade)->format('d/m/Y')}}</td>
          <td>
              @if($registro->status == 'Aprovado') <i class="fas fa-check"></i>@endif
              @if($registro->status == 'Aguardando') <i class="fas fa-clock"></i>@endif

          </td>
          <td>{{$registro->token}}</td>

          <td>
              <a href="{{asset($registro->arquivo)}}" target="_blank" class="btn btn-success"><i class="fas fa-eye"></i></a>
              <a href="{{route('docs.aut',$registro->id)}}" class="btn btn-warning"><i class="fas fa-check"></i></a>
              <a href="{{route('docs.del',$registro->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
          </td>
      </tr>
@endforeach
    </tbody>
</table>

@stop

