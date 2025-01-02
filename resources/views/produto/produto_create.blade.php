@extends('adminlte::page')

@section('content')
<link rel="stylesheet" href="{{ url('/richtexteditor/rte_theme_default.css') }}" />
<script type="text/javascript" src="{{ url('/richtexteditor/rte.js') }}"></script>
<script type="text/javascript" src="{{ url('/richtexteditor/plugins/all_plugins.js') }}"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Adicionar produto</div>

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
                    <div class="card-header">
                    <div class="d-flex justify-content-between">
            <div class="p-2"><h4>Adicionar produto</h4></div>
  <div class="p-2"></div>
  <div class="p-2"> <a href="{{ url('/produto') }}" class="btn btn-light">Voltar</a>
  </div>
                    </div>
                    <div class="card-body">

                <form method='POST' action="{{ URL('/produto') }}" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">

<label for="cars">Escolha uma categoria:</label><br>

<select name="categoria_id"  class="form-control"id="cars">
    @foreach ($categorias as $value)
        <option value="{{ $value->id }}">{{ $value->nome }}</option>
    @endforeach
</select>
<br>
                    <div class="mb-3">
                        <label for="name">Nome</label>
                        <input type="text" name="nome" class="form-control" placeholder="Digite o nome da produto">
                    </div>

                    <div class="mb-3">
                    <label for="exampleInputEmail1">Descrição</label>

<textarea id="inp_editor1" class="form-control" name="descricao" rows="4" cols="50"></textarea>
                    </div>

                    <div class="mb-3">
                    <label>Imagem</label>
                        <input type="file" name="imagem" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="name">Valor</label>
                        <input type="text" name="valor" class="form-control" placeholder="Digite o valor do produto">
                    </div>

                    <div class="mb-3">
                        <label for="name">Quantidade</label>
                        <input type="text" name="quantidade" class="form-control" placeholder="Digite o nome da produto">
                    </div>



                    <div class="mb-3">
                        <label for="name">Quantidade minima</label>
                        <input type="number" name="quantidade_min" class="form-control" placeholder="Digite o nome da produto">
                    </div>
                   
            
                    <button type="submit" class="btn btn-primary">Enviar</button>
            
                </form>
                <script>
                    var editor1 = new RichTextEditor("#inp_editor1");
                </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


