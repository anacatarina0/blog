@extends('adminlte::page')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Categorias</div>

                

                @if (session('mensagem'))
                    <br>
                    <div class="alert alert-success">
                        {{ session('mensagem') }}
                    </div>
                @endif

                <script>
                    function ConfirmDelete() {
                        return confirm('Tem certeza que deseja excluir este registro?');
                    }
                </script>

<div class="container mt-2">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">

            <div class="d-flex justify-content-between">
            <div class="p-2">Categorias</div>
  <div class="p-2"></div>
  <div class="p-2">                    <a href="{{ url('/categoria/create') }}" class="btn btn-success float-end"><i class="bi bi-plus-circle-dotted"></i> Adicionar categoria</a>
  </div>


            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
              <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Visualizar</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                    </thead>
                <tbody>

                    @foreach($categorias as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->nome }}</td>
                            <td>
                            <a href="{{ url('/categoria/' . $value->id) }}" class="btn btn-primary" role="button" aria-pressed="true"><i class="bi bi-eye"></i> Visualizar</a></td>
                           <td> <a href="{{ url('/categoria/' . $value->id . '/edit') }}" class="btn btn-warning" role="button" aria-pressed="true"><i class="bi bi-pencil-square"></i> Editar</a><td>


                            <form method='POST' action='{{ url('/categoria/' . $value->id) }}' onsubmit="return ConfirmDelete()">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Excluir</button>
                                  
                            
                            </form>

                            
                        </tr>
                    @endforeach


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection


