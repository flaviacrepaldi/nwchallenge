@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Guerreiros New Way
                    <a class="pull-right" href="{{url('guerreiros/novoguerreiro')}}"> Novo guerreiro </a>    
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
                                <th>Imagem</th>
                                <th>Nome</th>
                                <th>Tipo</th> 
                                <th>Especialidades</th> 
                                <th>Vida</th> 
                                <th>Defesa</th> 
                                <th>Dano</th>
                                <th>Velocidade de Ataque</th>
                                <th>Velocidade de Movimento</th>  
                                <th>Ações</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($guerreiros as $guerreiro)
                                <tr>
                                    <th scope="row" class="text-center">{{ $guerreiro->id }}</th> 
                                    <td>
                                        <img src="http://nwchallenge.com/imagens/guerreiros/{{ $guerreiro->imagem_guerreiro }}" style="max-width: 150px;" />
                                    </td>                                   
                                    <td width="200px">{{ $guerreiro->nome }}</td>
                                    <td>{{ $guerreiro->consultaTipoGuerreiro($guerreiro->id_tipo) }}</td>

                                    <td width="200px">
                                        @foreach(($guerreiro->consultaEspecialidades($guerreiro->id)) as $especialidade)
                                            <span>{{ $especialidade->especialidade }}</span></br>
                                        @endforeach
                                    </td>                              
                                    
                                    <td>{{ $guerreiro->vida }}</td>
                                    <td>{{ $guerreiro->defesa }}</td>
                                    <td>{{ $guerreiro->dano }}</td>
                                    <td>{{ $guerreiro->velocidade_ataque }}</td>
                                    <td>{{ $guerreiro->velocidade_movimento }}</td>
                                    <td width="155" class="text-center">
                                        <a href="{{env('APP_URL')}}guerreiros/editar/{{$guerreiro->id}}" class="btn btn-default btn-sm">Editar</a>
                                        <a href="{{env('APP_URL')}}guerreiros/excluir/{{$guerreiro->id}}" class="btn btn-danger btn-sm">Excluir</a>
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