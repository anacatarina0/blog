@extends('adminlte::page')

@section('content')
<link rel="stylesheet" href="{{ url('/richtexteditor/rte_theme_default.css') }}" />
<script type="text/javascript" src="{{ url('/richtexteditor/rte.js') }}"></script>
<script type="text/javascript" src="{{ url('/richtexteditor/plugins/all_plugins.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="container mt-2">
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="d-flex justify-content-between">
            <div class="p-2"><h4>Editar produto</h4></div>
  <div class="p-2"></div>
  <div class="p-2"> <a href="{{ url('/produto') }}" class="btn btn-light">Voltar</a>
  </div>
                    </div>
                    <div class="card-body">

                <form method='POST' action="{{ URL('/produto/' . $produto->id) }}">
                    @method('PUT')
                    @csrf

                    <label for="cars">Escolha uma categoria:</label><br>

<select name="categoria_id"  class="form-control"id="cars">
    @foreach ($categorias as $value)

        @if($value->id == $produto->id)
            <option selected="selected" value="{{ $value->id }}">{{ $value->nome }}</option>
        @else
            <option value="{{ $value->id }}">{{ $value->nome }}</option>
        @endif

    @endforeach
</select>


                    <div class="mb-3">
                    <label for="nome">Nome</label>
                        <input type="text" name="nome" value="{{ $produto->nome }}" class="form-control" placeholder="Digite o nome da produto">
                    </div>

                    <div class="mb-3">
                     <label for="descricao">Descrição</label>
                     <textarea  id="inp_editor1" class="form-control" name="descricao" rows="4" cols="50">{{ $produto->descricao }}</textarea>
                 </div>

                 <div class="mb-3">
  <label for="formFile" class="form-label">Imagem</label>
  <input class="form-control" type="file" name="imagem">
</div>


              
                 <div class="mb-3">
                 <label for="valor">Valor</label>
                     <input type="text" name="valor" value="{{ $produto->valor }}" class="form-control" placeholder="Digite o nome da produto">
                 </div>

                 <div class="row g-3">             
                 
                 
                 <div class="col">
                    <label for="name">Quantidade minima</label>
                        <input type="number" name="quantidade_min" class="form-control" placeholder="Last name" aria-label="Last name">
                    </div>
                </div>
<br>
      
                    <div class="mb-3">
                     
                                <button type="submit"  class="btn btn-primary">Enviar</button>
                            </div>

                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection



