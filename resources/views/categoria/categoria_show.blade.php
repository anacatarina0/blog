@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Categoria') }}</div>


                <div class="container mt-2">
            <div class="row">
                <div class="col-md-12">
                  
                       
                    </div>
                    <div class="card-body">
                    <div class="mb-3"class="form-control">
                    <p><strong>ID:</strong> {{ $categoria->id }}</p>     
                <p><strong>Nome:</strong> {{ $categoria->nome }}</p>
                <p><strong>Criação:</strong> {{ $categoria->created_at }}</p>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


