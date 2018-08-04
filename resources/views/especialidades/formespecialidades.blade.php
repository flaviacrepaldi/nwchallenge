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
                    <form action="{{ route('especialidades.salvar') }}" method="POST" enctype="multipart/form-data">                
	                	{{ csrf_field() }}
						<div class="form-group">
						  	<label for="especialidade">Nova especialidade</label>
						    <input type="text" class="form-control" name="especialidade" id="especialidade" placeholder="Especialidade">
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