@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Informe o nome da especialidade no campo abaixo
                    <a class="pull-right" href="{{url('especialidades')}}"> Ver todas </a>    
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{Form::open()}}
                        {{Form::input('text', 'nome', '', ['class' => 'form-control', 'autofocus', 'placeholder' => 'Especialidade'])}}
                        
                    {{Form::close()}}                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection