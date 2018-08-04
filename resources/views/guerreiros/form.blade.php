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
                    {{Form::open()}}
                    
                    {{Form::close()}}                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection