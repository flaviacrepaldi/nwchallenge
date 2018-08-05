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
Você confirma exlusão do item:
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="text-center">{{ $guerreiro->id }}</th> 
                                <td>
                                    <img src="http://nwchallenge.com/imagens/guerreiros/{{ $guerreiro->imagem_guerreiro }}"  width="10%" />
                                </td>                                   
                                <td>{{ $guerreiro->nome }}</td>
                                <td>{{ $guerreiro->consultaTipoGuerreiro($guerreiro->id_tipo) }}</td>

                                <td>
                                    @foreach(($guerreiro->consultaEspecialidades($guerreiro->id)) as $especialidade)
                                        <span>{{ $especialidade->especialidade }}</span></br>
                                    @endforeach
                                </td>                              
                                
                                <td>{{ $guerreiro->vida }}</td>
                                <td>{{ $guerreiro->defesa }}</td>
                                <td>{{ $guerreiro->dano }}</td>
                                <td>{{ $guerreiro->velocidade_ataque }}</td>
                                <td>{{ $guerreiro->velocidade_movimento }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table>
                        <tr>
                            <td>
                            <a href="{{env('APP_URL')}}guerreiros/confirmarexcluir/{{$guerreiro->id}}" class="btn btn-default btn-sm">Confirmar</a>
                            <a href="{{env('APP_URL')}}guerreiros" class="btn btn-danger btn-sm">Cancelar</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection