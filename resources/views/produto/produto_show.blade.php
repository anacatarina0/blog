@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Produto') }}</div>


                <div class="container mt-2">
            <div class="row">
                <div class="col-md-12">
                  
                       
                    </div>
                    <div class="card-body">
                    <div class="mb-3"class="form-control">
                <p><strong>Categoria:</strong> {{ $produto->categoria->nome }}</p> 
                <p><strong>ID do produto:</strong> {{ $produto->id }}</p>     
                <p><strong>Nome:</strong> {{ $produto->nome }}</p>
                <p><strong>Descrição:</strong> {!! $produto->descricao !!}</p>
                <p><strong>Imagem:</strong> <img src="data:image/png;base64, {{ $produto->imagem }}" alt="Imagem" /></p>
                <p><strong>Valor:</strong> {{"R$ " . $produto->valor }}</p>
                <p><strong>Quantidade:</strong> {{ $produto->quantidade }}</p>
                <p><strong>Criador:</strong> {{ $produto->criador->name }}</p>
                <p><strong>Criação:</strong> {{ $produto->created_at }}</p>
</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


