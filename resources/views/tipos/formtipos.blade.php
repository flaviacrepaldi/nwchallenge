@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Informe o novo tipo no campo abaixo
                    <a class="pull-right" href="{{url('tipos')}}"> Ver todos </a>    
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                        
                    <form action="{{ route('tipos.salvar') }}" method="POST" enctype="multipart/form-data">                
	                	{{ csrf_field() }}
						<div class="form-group">
						  	<label for="name">Tipo de guerreiro</label>
						    <input type="text" class="form-control" name="tipo" id="tipo" placeholder="Tipo">
						</div>                        
                        <br />
						<button type="submit" class="btn btn-primary">Salvar</button>
	                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection