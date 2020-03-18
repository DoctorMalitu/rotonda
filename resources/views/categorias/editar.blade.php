@extends('layouts.app')
@section('seccion')
<h1>Editar Categoria: {{$categorias->nombre }}</h1>

@if(session('mensaje'))

<div class="alert alert-success">
	{{ session('mensaje') }}
</div>
@endif

<form action="{{ route('categorias.update',$categorias->id)  }}" method="POST">
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

	<input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ $categorias->nombre }}">
	<textarea type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2" value="">{{$categorias->descripcion }}</textarea>

	<button class="btn btn-warning btn-block" type="submit">Editar</button>
</form>
@endsection