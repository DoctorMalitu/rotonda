<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;

class IngredientesController extends Controller {
	public function inicio() {
		$ingredientes = App\Ingredientes::all();
		return view('ingredientes', compact('ingredientes'));
	}
	public function crear(Request $request) {
		$request->validate([
			'nombre' => 'required',
			'precio' => 'required',
			'descripcion' => 'required',
		]);
		$ingredientesNuevo = new App\Ingredientes;
		$ingredientesNuevo->nombre = $request->nombre;
		$ingredientesNuevo->precio = $request->precio;
		$ingredientesNuevo->descripcion = $request->descripcion;

		$ingredientesNuevo->save();

		return redirect()->back()->with('mensaje', 'Ingrediente Agregado!');
	}
	public function editar($id) {
		$ingredientes = App\Ingredientes::findorFail($id);
		return view('ingredientes.editar', compact('ingredientes'));
	}
	public function update(Request $request, $id) {
		$ingredientesUpdate = App\Ingredientes::findorFail($id);
		$ingredientesUpdate->nombre = $request->nombre;
		$ingredientesUpdate->descripcion = $request->descripcion;
		$ingredientesUpdate->precio = $request->precio;

		$ingredientesUpdate->save();

		return redirect()->back()->with('mensaje', 'Ingrediente Actualizado!');
	}

	public function eliminar($id) {
		$ingredientesEliminar = App\Ingredientes::findorFail($id);
		$ingredientesEliminar->delete();
		return redirect()->back()->with('mensaje', 'Ingrediente Eliminado!');
	}
}
