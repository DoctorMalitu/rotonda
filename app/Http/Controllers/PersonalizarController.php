<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class PersonalizarController extends Controller {
	public function inicio($id) {
		//DB::enableQueryLog();

		$personalizar = App\Recetas_ingrediente::select('recetas_ingredientes.id as personalizado_id', 'ingredientes.nombre as ingrediente', 'recetas.nombre as receta', 'recetas_ingredientes.cantidad as cantidad', 'recetas_ingredientes.estado as estado')
			->Join('ingredientes', 'recetas_ingredientes.id_ingrediente', '=', 'ingredientes.id')
			->Join('recetas', 'recetas_ingredientes.id_receta', '=', 'recetas.id')
			->where('recetas_ingredientes.id_receta', '=', $id)
			->get();

		$ingredientes = App\Ingredientes::all();
		$receta = App\Recetas::findorFail($id);
		//$log = DB::getQueryLog();
		//var_dump($log);
		return view('personalizar', compact('personalizar', 'ingredientes', 'receta'));

	}
	public function crear(Request $request) {
		$request->validate([
			'ingrediente' => 'required',
		]);
		$personalizarNuevo = new App\Recetas_ingrediente;
		$personalizarNuevo->id_ingrediente = $request->ingrediente;
		$personalizarNuevo->id_receta = $request->receta;
		$personalizarNuevo->cantidad = $request->cantidad;
		if ($request->has('estado')) {
			$personalizarNuevo->estado = 1;
		} else {
			$personalizarNuevo->estado = 0;
		}

		$personalizarNuevo->save();

		return redirect()->back()->with('mensaje', 'Ingrediente Agregado!');
	}
	public function editar($id) {
		$personalizado = App\Recetas_ingrediente::findorFail($id);
		return view('personalizar.editar', compact('personalizado'));
	}
	public function update(Request $request, $id) {
		$personalizarUpdate = App\Recetas_ingrediente::findorFail($id);
		$personalizarUpdate->cantidad = $request->cantidad;
		if ($request->has('estado')) {
			$personalizarUpdate->estado = 1;
		} else {
			$personalizarUpdate->estado = 0;
		}

		$personalizarUpdate->save();

		return redirect()->back()->with('mensaje', 'Ingrediente Actualizado!');
	}

	public function eliminar($id) {
		$personalizarEliminar = App\Recetas_ingrediente::findorFail($id);
		$personalizarEliminar->delete();
		return redirect()->back()->with('mensaje', 'ingrediente Eliminado!');
	}
}
