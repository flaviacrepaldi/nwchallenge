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
                    <form action="{{ route('guerreiros.salvar') }}" method="POST" enctype="multipart/form-data">                
	                	{{ csrf_field() }}
						<div class="form-group">
						  	<label for="nome">Nome</label>
						    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
                            
                            <label for="tipo">Tipo</label>
                             <select name="tipo" class="form-control selectpicker" data-live-search="true" title="Tipo">
                                <?php 
                                if(!empty($tipos)){
                                    foreach($tipos as $tipo){ ?>
                                        <option value="<?= $tipo->id ?>"> <?= $tipo->tipo ?></option>
                                    <?php }
                                } ?>
                            </select>

                            <label for="especialidade">Especialidades</label>

                            
                            <select name="especialidade[]" class="form-control selectpicker" multiple="" data-live-search="true" title="Especialidade">
                                <?php 
                                if(!empty($especialidades)){
                                    foreach($especialidades as $especialidade){ ?>
                                        <option value="<?= $especialidade->id ?>"> <?= $especialidade->especialidade ?></option>
                                    <?php }
                                } ?>
                            </select>

                            <label for="vida">Vida</label>
						    <input type="text" class="form-control" name="vida" id="vida" placeholder="ex: 6000">
                            <label for="defesa">Defesa</label>
						    <input type="text" class="form-control" name="defesa" id="defesa" placeholder="ex: 360">
                            <label for="dano">Dano</label>
						    <input type="text" class="form-control" name="dano" id="dano" placeholder="ex: 300">
                            <label for="velocidadeAtaque">Velocidade de Ataque</label>
						    <input type="text" class="form-control" name="velocidadeAtaque" id="velocidadeAtaque" placeholder="ex: 1.2">
                            <label for="velocidadeMovimento">Velocidade de Movimento</label>
						    <input type="text" class="form-control" name="velocidadeMovimento" id="velocidadeMovimento" placeholder="ex: 330">

                            <label for="nome">Imagem</label>
                            <div class="control-group input-images">                         
                            
                            <div class="controls">
                                <input name="imagem" type="file">
                            </div>
                        </div>

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