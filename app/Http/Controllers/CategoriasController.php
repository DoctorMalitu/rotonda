<?php
namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;

class CategoriasController extends Controller {
	public function inicio() {
		$categorias = App\Categoria_platos::all();
		return view('categorias', compact('categorias'));
	}
	public function crear(Request $request) {
		$request->validate([
			'nombre' => 'required',
			'descripcion' => 'required',
		]);
		$categoriasNuevo = new App\Categoria_platos;
		$categoriasNuevo->nombre = $request->nombre;
		$categoriasNuevo->descripcion = $request->descripcion;

		$categoriasNuevo->save();

		return redirect()->back()->with('mensaje', 'Categoria Agregada!');
	}
	public function editar($id) {
		$categorias = App\Categoria_platos::findorFail($id);
		return view('categorias.editar', compact('categorias'));
	}
	public function update(Request $request, $id) {
		$categoriasUpdate = App\Categoria_platos::findorFail($id);
		$categoriasUpdate->nombre = $request->nombre;
		$categoriasUpdate->descripcion = $request->descripcion;

		$categoriasUpdate->save();

		return redirect()->back()->with('mensaje', 'Categoria Actualizada!');
	}

	public function eliminar($id) {
		$categoriasEliminar = App\Categoria_platos::findorFail($id);
		$categoriasEliminar->delete();
		return redirect()->back()->with('mensaje', 'Categoria Eliminada!');
	}
	//
}
