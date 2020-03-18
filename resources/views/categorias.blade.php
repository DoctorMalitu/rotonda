@extends('layouts.app')

@section('seccion')
<h1 class="display-4">
    Categoria de los platos
</h1>

@if(session('mensaje'))
<div class="alert alert-success">
	{{ session('mensaje') }}
</div>
@endif
<form action="{{ route('categorias.crear') }}" method="POST">
	@csrf

	<div class="form-group">
	<input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2 {{ $errors->has('nombre') ? 'is-invalid' : '' }}" value="{{ old('nombre') }}">{!! $errors->first('nombre','<span class="help-block invalid-feedback">:message</span>') !!}
	</div>
<div class="form-group">
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
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($categorias as $item)
    <tr>
      <th scope="row">{{ $item->id }}</th>
      <td>{{ $item->nombre }}</a>

      </td>
      <td>{{ $item->descripcion }}</td>
      <td><a href="{{ route('categorias.editar',$item) }}" class="btn btn-warning btn-sm">Editar</a>

		<form action="{{ route('categorias.eliminar',$item) }}" method="POST" class="d-inline">
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