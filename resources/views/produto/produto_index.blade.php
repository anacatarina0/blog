@extends('adminlte::page')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Produtos</div>
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
            <div class="p-2">    <a href="{{ url('/produto/create') }}" class="btn btn-success float-end"><i class="bi bi-plus-circle-dotted"></i> Adicionar produto</a></div>
  <div class="p-2"></div>
  <div class="p-2">   
        <!-- Formulário de pesquisa -->
        <form action="{{ route('produtos.pesquisar') }}" method="get" class="form-inline">
            <div class="form-group">
                <label for="search" class="sr-only">Pesquisar</label>
                <input type="text" name="q" class="form-control mr-2" id="search" name="q" placeholder="Buscar..." required>
            </div>
            <button type="submit" class="btn btn-primary">
            <i class="bi bi-search"></i></button>
        </form>
         
  </div>


  

            </div>
            
            <div class="card-body">
              <table class="table table-bordered table-striped">
              <thead>
                    <tr>
                        <th>Adicionar itens</th>
                        <th>ID</th>
                        <th>Categoria</th>
                        <th>Produto</th>
                        <th>Valor</th>
                        <th>Quantidade</th>
                        <th>Visualizar</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                    </thead>
                <tbody>

                    @foreach($produtos as $value)
                        <tr>
                            <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#add{{ $value->id }}"><i class="bi bi-plus-circle"></i> Adicionar itens</button>
                            <div class="modal" id="add{{ $value->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Adicionar {{$value->nome}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method='POST' action="{{ URL('/produto/add/' . $value->id) }}">
        @csrf
      <div class="mb-3">
                        <label for="name">Inserir itens</label>
                        <input type="number" name="quantidade" class="form-control" >
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
                  </form>
      </div>
    </div>
  </div>
</div>
</td>
                            
                            <td>{{ $value->id }}</td>
                            
                            <td>{{ $value->categoria->nome }}</td>
                            <td>{{ $value->nome }}</td>
                            <td>{{ $value->valor }}</td>
                            <td>{{ $value->quantidade }}</td>
                            <td>
                            <a href="{{ url('/produto/' . $value->id) }}" class="btn btn-primary" role="button" aria-pressed="true"><i class="bi bi-eye"></i> Visualizar</a></td>
                           <td> <a href="{{ url('/produto/' . $value->id . '/edit') }}" class="btn btn-warning" role="button" aria-pressed="true"><i class="bi bi-pencil-square"></i> Editar</a><td>


                            <form method='POST' action='{{ url('/produto/' . $value->id) }}' onsubmit="return ConfirmDelete()">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Excluir</button>

                            </form>
                            <script>
                    var editor1 = new RichTextEditor("#inp_editor1");
                </script>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


