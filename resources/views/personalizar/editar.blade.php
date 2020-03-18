@extends('layouts.app')
@section('seccion')
<h1>Editar </h1>

@if(session('mensaje'))

<div class="alert alert-success">
	{{ session('mensaje') }}
</div>
@endif

<form action="{{ route('personalizar.update',$personalizado->id)  }}" method="POST">
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
		@error('precio')
	<div class="alert alert-danger">
		El precio es obligatorio
	</div>
	@enderror
	 <div class="form-group">
  <div class="qty mt-5 d-flex">
    <span class="mr-3">Cantidad: </span>
                        <span class="minus bg-dark">-</span>
                        <input type="number" class="count mx-2" name="cantidad" value="{{ $personalizado->cantidad }}">
                        <span class="plus bg-dark">+</span>
                    </div>
</div>
  <div class="form-group d-flex justify-content-start align-items-center" style="
    width: 250px;
    height: 50px;
">
<span class="mr-3">Activar ingrediente</span>
    <label class="switch ">

          <input type="checkbox" name="estado" class="default" {{ $personalizado->estado==1 ? 'checked':'' }}>
          <span class="slider"></span></label>
</div>
	<button class="btn btn-warning" type="submit">Editar</button>
</form>
<a href="{{route('personalizar',$personalizado->id_receta) }}" class="btn btn-dark mt-3"> Volver</a>
@endsection