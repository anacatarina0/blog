@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                    <div class="card-header">
                    <div class="d-flex justify-content-between">
            <div class="p-2"><h4>Editar</h4></div>
  <div class="p-2"></div>
  <div class="p-2"> <a href="{{ url('/categoria') }}" class="btn btn-light">Voltar</a>
  </div>
                    </div>
                    <div class="card-body">

                <form method='POST' action="{{ URL('/categoria/' . $categoria->id) }}">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                     
                        <input type="text" name="nome" value="{{ $categoria->nome }}" class="form-control" placeholder="Digite o nome da categoria">
                    </div>

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


