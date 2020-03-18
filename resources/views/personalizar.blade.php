@extends('layouts.app')

@section('seccion')
<h1 class="display-4">
   {{ $receta->nombre }}
</h1>

@if(session('mensaje'))
<div class="alert alert-success">
	{{ session('mensaje') }}
</div>
@endif
<form action="{{ route('personalizar.crear') }}" method="POST">
	@csrf



    <div class="form-group">
    <select class="form-control" id="exampleFormControlSelect1" name="ingrediente">
    	<option selected="selected" disabled>Ingrediente ...</option>
    	@foreach($ingredientes as $item)
      <option value="{{ $item->id }}">{{ $item->nombre }}</option>
      @endforeach
          </select>
  </div>
  <div class="form-group">
  <div class="qty mt-5 d-flex">
    <span class="mr-3">Cantidad: </span>
                        <span class="minus bg-dark">-</span>
                        <input type="number" class="count mx-2" name="cantidad" value="0">
                        <span class="plus bg-dark">+</span>
                    </div>
</div>
  <div class="form-group d-flex justify-content-start align-items-center" style="
    width: 250px;
    height: 50px;
">
<span class="mr-3">Activar ingrediente</span>
    <label class="switch ">

          <input type="checkbox" name="estado" class="default">
          <span class="slider"></span></label>
</div>
<input type="hidden" name="receta" id="" value="{{ $receta->id }}" />
	<button class="btn btn-primary" type="submit">Agregar</button>
</form>
<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Ingrediente</th>
      <th scope="col">Receta</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($personalizar as $item)
    <tr>
      <th scope="row">{{ $item->personalizado_id }}</th>
      <td>{{ $item->ingrediente}}</a></td>
      <td>{{ $item->receta }}</td>
      <td>{{ $item->cantidad }}</td>
      <td>{{ $item->estado==1 ? 'Activo':'Inactivo'}}</td>

      <td><a href="{{ route('personalizar.editar',$item->personalizado_id) }}" class="btn btn-warning btn-sm">Editar</a>

		<form action="{{ route('personalizar.eliminar',$item->personalizado_id) }}" method="POST" class="d-inline">
			@method('DELETE')
			@csrf
			<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
		</form>
      </td>
    </tr>
	@endforeach
  </tbody>
</table>
@endsection
