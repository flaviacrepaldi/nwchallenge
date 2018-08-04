@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Especialidades
                    <a class="pull-right" href="{{url('especialidades/novaespecialidade')}}"> Nova Especialidade </a>    
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Lista de especialidades
                </div>
            </div>
        </div>
    </div>
</div>
@endsection