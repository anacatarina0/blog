@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Adicionar categoria</div>

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
            <div class="p-2"><h4>Adicionar categoria</h4></div>
  <div class="p-2"></div>
  <div class="p-2"> <a href="{{ url('/categoria') }}" class="btn btn-light">Voltar</a>
  </div>
                    </div>
                    <div class="card-body">

                <form method='POST' action="{{ URL('/categoria') }}">

                    @csrf
                    
                    <div class="mb-3">
                        <label for="name">Nome</label>
                        <input type="text" name="nome" class="form-control" placeholder="Digite o nome da categoria">
                    </div>

                   
            
                    <button type="submit" class="btn btn-primary">Enviar</button>
            
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


