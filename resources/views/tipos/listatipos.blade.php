@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tipos de Guerreiro
                    <a class="pull-right" href="{{url('tipos/novotipo')}}"> Novo tipo </a>    
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
                    @endif                    

                     <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tipo</th>
                                <th>Ações</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tipos as $tipo)
                                <tr>
                                    <th scope="row" class="text-center">{{ $tipo->id }}</th>
                                    <td>{{ $tipo->tipo }}</td>
                                    <td width="155" class="text-center">
                                        <a href="tipos/editar/{{$tipo->id}}" class="btn btn-default btn-sm">Editar</a>
                                        <a href="tipos/excluir/{{$tipo->id}}" class="btn btn-danger btn-sm">Excluir</a>
                                    </td>                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection