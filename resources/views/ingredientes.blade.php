@extends('layouts.app')

@section('seccion')
<h1 class="display-4">
    Ingredientes
</h1>

@if(session('mensaje'))
<div class="alert alert-success">
	{{ session('mensaje') }}
</div>
@endif
<form action="{{ route('ingredientes.crear') }}" method="POST">
	@csrf


	<div class="form-class">
	<input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2 {{ $errors->has('nombre') ? 'is-invalid' : '' }}" value="{{ old('nombre') }}">
	{!! $errors->first('nombre','<span class="help-block invalid-feedback">:message</span>') !!}
	</div>
	<div class="form-class">
	<input type="number" name="precio" placeholder="precio" class="form-control mb-2 {{ $errors->has('precio') ? 'is-invalid' : '' }}" value="{{ old('precio') }}">
	{!! $errors->first('precio','<span class="help-block invalid-feedback">:message</span>') !!}
	</div>
	<div class="form-class">
	<textarea type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2 {{ $errors->has('descripcion') ? 'is-invalid' : '' }}"value="">{{ old('descripcion') }}</textarea>
	{!! $errors->first('descripcion','<span class="help-block invalid-feedback">:message</span>') !!}
	</div>
	<button class="btn btn-primary" type="submit">Agregar</button>
</form>
<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">precio</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($ingredientes as $item)
    <tr>
      <th scope="row">{{ $item->id }}</th>
      <td>{{ $item->nombre }}</a>

      </td>
      <td>{{ $item->descripcion }}</td>
      <td>{{ $item->precio }}</td>
      <td><a href="{{ route('ingredientes.editar',$item) }}" class="btn btn-warning btn-sm">Editar</a>

		<form action="{{ route('ingredientes.eliminar',$item) }}" method="POST" class="d-inline">
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