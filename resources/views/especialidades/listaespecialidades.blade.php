@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Especialidades
                    <a class="pull-right" href="{{url('especialidades/novaespecialidade')}}"> Nova especialidade </a>    
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
                                <th>Especialidade</th>
                                <th>Ações</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($especialidades as $especialidade)
                                <tr>
                                    <th scope="row" class="text-center">{{ $especialidade->id }}</th>
                                    <td>{{ $especialidade->especialidade }}</td>
                                    <td width="155" class="text-center">
                                        <a href="especialidades/editar/{{$especialidade->id}}" class="btn btn-default btn-sm">Editar</a>
                                        <a href="especialidades/excluir/{{$especialidade->id}}" class="btn btn-danger btn-sm">Excluir</a>
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