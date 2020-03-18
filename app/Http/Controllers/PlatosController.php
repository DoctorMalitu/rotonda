<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlatosController extends Controller {
	public function inicio() {
		//DB::enableQueryLog();

		$platos = App\Platos::select('platos.id as plato_id', 'platos.nombre as nombre', 'platos.descripcion as descripcion', 'platos.precio as precio', 'categoria_platos.nombre as categoria', 'recetas.nombre as receta', 'restaurantes.nombre as restaurante')
			->Join('restaurantes', 'platos.restaurante', '=', 'restaurantes.id')
			->Join('categoria_platos', 'platos.categoria', '=', 'categoria_platos.id')
			->Join('recetas', 'platos.receta', '=', 'recetas.id')
			->get();

		$restaurante = App\Restaurante::all();
		$recetas = App\Recetas::all();
		$categoria = App\Categoria_platos::all();
		$log = DB::getQueryLog();
		//var_dump($log);
		return view('platos', compact('platos', 'restaurante', 'categoria', 'recetas'));

	}
	public function crear(Request $request) {
		$request->validate([
			'nombre' => 'required',
			'precio' => 'required|numeric|min:0',
			'descripcion' => 'required',
			'categoria' => 'required',
			'receta' => 'required',
			'restaurante' => 'required',
		]);
		$platosNuevo = new App\Platos;
		$platosNuevo->nombre = $request->nombre;
		$platosNuevo->precio = $request->precio;
		$platosNuevo->descripcion = $request->descripcion;
		$platosNuevo->categoria = $request->categoria;
		$platosNuevo->receta = $request->receta;
		$platosNuevo->restaurante = $request->restaurante;

		$platosNuevo->save();

		return redirect()->back()->with('mensaje', 'Plato Agregado!');
	}
	public function editar($id) {
		$platos = App\Platos::findorFail($id);
		$recetas = App\Recetas::all();
		$categoria = App\Categoria_platos::all();
		$restaurante = App\Restaurante::all();
		return view('platos.editar', compact('platos', 'restaurante', 'categoria', 'recetas'));
	}
	public function update(Request $request, $id) {
		$platosUpdate = App\Platos::findorFail($id);
		$platosUpdate->nombre = $request->nombre;
		$platosUpdate->descripcion = $request->descripcion;
		$platosUpdate->precio = $request->precio;
		$platosUpdate->categoria = $request->categoria;
		$platosUpdate->receta = $request->receta;
		$platosUpdate->restaurante = $request->restaurante;

		$platosUpdate->save();

		return redirect()->back()->with('mensaje', 'Plato Actualizado!');
	}

	public function eliminar($id) {
		$platosEliminar = App\Platos::findorFail($id);
		$platosEliminar->delete();
		return redirect()->back()->with('mensaje', 'Plato Eliminado!');
	}
}
