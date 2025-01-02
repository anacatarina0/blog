@extends('adminlte::page')

@section('content')
<!-- Exibir resultados da pesquisa -->
<div class="card">
    <div class="card-header">Produtos</div>
    <div class="card-body">
        <table class="table table-bordered table-striped">

        
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                 
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->categoria->nome }}</td>
                        <td>{{ $produto->valor }}</td>
                        <td>{{ $produto->quantidade }}</td>
                        
                     
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection