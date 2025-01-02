@extends('adminlte::page')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Saídas</div>



                <div class="container mt-2">
      <div class="row">
        <div class="col-md-12">
          
           
        @foreach ($produtos as $value) 
 <form class="row gy-2 gx-3 align-items-center" method='POST' action="{{ URL('/Saida/vender/' . $value->id) }}">

  @csrf

  </div>
  
  <div class="col-md-2">
  <fieldset disabled>
    <label for="inputZip" class="form-label">ID</label>
     
    <input type="text" name="#" class="form-control" id="{{$value->id}}" placeholder="{{ $value->id }}">
   
   
  </div>

  <div class="col-md-6">
    
    <label for="cars" class="form-label">Escolha um produto</label>
    <select name="produto_id" class="form-select" id="cars">

            <option selected="selected" value="{{ $value->id }}">{{ $value->nome }}</option>
            
  
    </select>


  </div>
  <div class="col-md-4">
    <label for="inputZip" class="form-label">Quantidade</label>
    <input type="number" name="quantidade" class="form-control" id="inputZip">
  </div>
  

  </div>
  <br>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Vender</button> 
  </div>
  <br>
</form>
</div>
</div>
</div>
@endforeach
@endsection
