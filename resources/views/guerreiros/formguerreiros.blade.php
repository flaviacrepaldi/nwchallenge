@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Informe as características nos campos abaixo
                    <a class="pull-right" href="{{url('guerreiros')}}"> Ver todos </a>    
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{Form::open(['url' => 'guerreiros/salvar'])}}
                        {{Form::label('nome', 'Nome')}}
                        {{Form::input('text', 'nome', '', ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome'])}}                            
                        {{Form::label('nome', 'Velocidade de ataque')}}
                        {{Form::input('number', 'velocidadeAtaque','', ['id' => 'velocidadeAtaque', 'class' => 'form-control', 'onkeypress' =>'return isNumberKey(event)',  'placeholder' => '0,0', 'maxlength' => '3'])}}
                        {{Form::input('text', 'nome', '', ['class' => 'form-control', '', 'placeholder' => 'Nome'])}}
                        {{Form::input('text', 'nome', '', ['class' => 'form-control', '', 'placeholder' => 'Nome'])}}
                        {{Form::input('text', 'nome', '', ['class' => 'form-control', '', 'placeholder' => 'Nome'])}}
                        {{Form::input('text', 'nome', '', ['class' => 'form-control', '', 'placeholder' => 'Nome'])}}
                        {{Form::input('text', 'nome', '', ['class' => 'form-control', '', 'placeholder' => 'Nome'])}}
                        {{Form::input('text', 'nome', '', ['class' => 'form-control', '', 'placeholder' => 'Nome'])}}                   
                        {{Form::submit('Salvar', ['class'=>'btn btn_primary'])}}
                    {{Form::close()}}                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection