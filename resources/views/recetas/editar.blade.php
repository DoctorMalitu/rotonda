@extends('layouts.app')
@section('seccion')
<h1>Editar Receta: {{$recetas->nombre }}</h1>

@if(session('mensaje'))

<div class="alert alert-success">
	{{ session('mensaje') }}
</div>
@endif

<form action="{{ route('recetas.update',$recetas->id)  }}" method="POST">
	@method('PUT')
	@csrf

	@error('nombre')
	<div class="alert alert-danger">
		El nombre es obligatorio
	</div>
	@enderror

	@error('descripcion')
	<div class="alert alert-danger">
		La descripcion es obligatoria
	</div>
	@enderror

	<input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ $recetas->nombre }}">
	<textarea type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2" value="">{{$recetas->descripcion }}</textarea>

	<button class="btn btn-warning btn-block" type="submit">Editar</button>
</form>
@endsection