<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;

class RestauranteController extends Controller {
	public function inicio() {
		$restaurante = App\Restaurante::all();
		return view('restaurante', compact('restaurante'));
	}
	public function crear(Request $request) {
		$request->validate([
			'nombre' => 'required',
			'direccion' => 'required',
			'descripcion' => 'required',
		]);
		$restauranteNuevo = new App\Restaurante;
		$restauranteNuevo->nombre = $request->nombre;
		$restauranteNuevo->direccion = $request->direccion;
		$restauranteNuevo->descripcion = $request->descripcion;

		$restauranteNuevo->save();

		return redirect()->back()->with('mensaje', 'Restaurante Agregado!');
	}
	public function editar($id) {
		$restaurante = App\Restaurante::findorFail($id);
		return view('restaurante.editar', compact('restaurante'));
	}
	public function update(Request $request, $id) {
		$restauranteUpdate = App\Restaurante::findorFail($id);
		$restauranteUpdate->nombre = $request->nombre;
		$restauranteUpdate->descripcion = $request->descripcion;
		$restauranteUpdate->direccion = $request->direccion;

		$restauranteUpdate->save();

		return redirect()->back()->with('mensaje', 'Restaurante Actualizado!');
	}

	public function eliminar($id) {
		$restauranteEliminar = App\Restaurante::findorFail($id);
		$restauranteEliminar->delete();
		return redirect()->back()->with('mensaje', 'Restaurante Eliminado!');
	}
}
