@extends('layouts.app')
@section('seccion')
<h1>Editar Plato: {{$platos->nombre }}</h1>

@if(session('mensaje'))

<div class="alert alert-success">
	{{ session('mensaje') }}
</div>
@endif

<form action="{{ route('platos.update',$platos->id)  }}" method="POST">
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
	<input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ $platos->nombre }}">
		<input type="text" name="precio" placeholder="Precio" class="form-control mb-2" value="{{ $platos->precio }}">
	<textarea type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2" value="">{{$platos->descripcion }}</textarea>
  <div class="form-group">
    <select class="form-control" id="exampleFormControlSelect1" name="categoria">
    	<option disabled>Categoria ...</option>
    	@foreach($categoria as $item)
      <option @if ($item->id==$platos->categoria)
      	selected
      @endif value="{{ $item->id }}">{{ $item->nombre }}</option>
      @endforeach
          </select>
  </div>
   <div class="form-group">
    <select class="form-control" id="exampleFormControlSelect1" name="receta">
    	<option disabled>Receta ...</option>
    	@foreach($recetas as $item)
      <option @if ($item->id==$platos->receta)
      	selected
      @endif value="{{ $item->id }}">{{ $item->nombre }}</option>
      @endforeach
          </select>
  </div>
   <div class="form-group">
    <select class="form-control" id="exampleFormControlSelect1" name="restaurante">
    	<option disabled>Restaurante ...</option>
    	@foreach($restaurante as $item)
      <option @if ($item->id==$platos->restaurante)
      	selected
      @endif value="{{ $item->id }}">{{ $item->nombre }}</option>
      @endforeach
          </select>
  </div>
	<button class="btn btn-warning btn-block" type="submit">Editar</button>
</form>
@endsection