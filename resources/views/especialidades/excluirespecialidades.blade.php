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
                    Essa especialidade está vinculada a um ou mais guerreiros. Excluindo-a, você também exluirá os guerreiros a ela vinculada. Confirma a exclusão?
                     <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Especialidade</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <th scope="row" class="text-center">{{ $especialidade->id }}</th>
                                    <td>{{ $especialidade->especialidade }}</td>
                                </tr>
                        </tbody>
                    </table>
                    <table>
                        <tr>
                            <td width="155" class="text-center">
                                <a href="{{env('APP_URL')}}especialidades/confirmarexcluir/{{$especialidade->id}}" class="btn btn-default btn-sm">Confirmar</a>
                                <a href="{{env('APP_URL')}}especialidades" class="btn btn-danger btn-sm">Cancelar</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection