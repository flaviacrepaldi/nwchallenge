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
                    Esse tipo está vinculado a um ou mais guerreiros. Excluindo-o, você também exluirá os guerreiros a ele vinculado. Confirma a exclusão?
                     <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <th scope="row" class="text-center">{{ $tipo->id }}</th>
                                    <td>{{ $tipo->tipo }}</td>                                   
                                </tr>
                        </tbody>
                    </table>
                    <table>
                        <td width="155" class="text-center">
                            <a href="{{env('APP_URL')}}tipos/confirmarexcluir/{{$tipo->id}}" class="btn btn-default btn-sm">Confirmar</a>
                            <a href="{{env('APP_URL')}}tipos" class="btn btn-danger btn-sm">Cancelar</a>
                        </td> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection