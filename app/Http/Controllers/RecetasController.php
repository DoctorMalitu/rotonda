<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;

class RecetasController extends Controller {
	public function inicio() {
		$recetas = App\Recetas::all();
		return view('recetas', compact('recetas'));
	}
	public function crear(Request $request) {
		$request->validate([
			'nombre' => 'required',
			'descripcion' => 'required',
		]);
		$recetasNuevo = new App\Recetas;
		$recetasNuevo->nombre = $request->nombre;
		$recetasNuevo->descripcion = $request->descripcion;

		$recetasNuevo->save();

		return redirect()->back()->with('mensaje', 'Receta Agregada!');
	}
	public function editar($id) {
		$recetas = App\Recetas::findorFail($id);
		return view('recetas.editar', compact('recetas'));
	}
	public function update(Request $request, $id) {
		$recetasUpdate = App\Recetas::findorFail($id);
		$recetasUpdate->nombre = $request->nombre;
		$recetasUpdate->descripcion = $request->descripcion;

		$recetasUpdate->save();

		return redirect()->back()->with('mensaje', 'Receta Actualizada!');
	}

	public function eliminar($id) {
		$recetasEliminar = App\Recetas::findorFail($id);
		$recetasEliminar->delete();
		return redirect()->back()->with('mensaje', 'Receta Eliminada!');
	}
}
