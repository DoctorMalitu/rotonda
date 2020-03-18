 <?php

use Illuminate\Support\Facades\Route;

//Ruta de inicio
Route::get('/', 'PagesController@inicio')->name('inicio');
//*******************************************************************************
//Rutas Restaurantes
Route::get('restaurante', 'RestauranteController@inicio')->name('restaurante');

Route::get('restaurante/editar/{id}', 'RestauranteController@editar')->name('restaurante.editar');

Route::put('restaurante.editar/{id}', 'RestauranteController@update')->name('restaurante.update');

Route::delete('restaurante.eliminar/{id}', 'RestauranteController@eliminar')->name('restaurante.eliminar');

Route::post('restaurante.crear', 'RestauranteController@crear')->name('restaurante.crear');
//****************************************************************************************************

//Rutas Platos
Route::get('platos', 'PlatosController@inicio')->name('platos');

Route::get('platos/editar/{id}', 'PlatosController@editar')->name('platos.editar');

Route::put('platos.platos/{id}', 'PlatosController@update')->name('platos.update');

Route::delete('platos.eliminar/{id}', 'PlatosController@eliminar')->name('platos.eliminar');

Route::post('platos.crear', 'PlatosController@crear')->name('platos.crear');
//****************************************************************************************************

//Rutas Ingredientes
Route::get('ingredientes', 'ingredientesController@inicio')->name('ingredientes');

Route::get('ingredientes/editar/{id}', 'ingredientesController@editar')->name('ingredientes.editar');

Route::put('ingredientes.ingredientes/{id}', 'ingredientesController@update')->name('ingredientes.update');

Route::delete('ingredientes.eliminar/{id}', 'ingredientesController@eliminar')->name('ingredientes.eliminar');

Route::post('ingredientes.crear', 'ingredientesController@crear')->name('ingredientes.crear');
//****************************************************************************************************

//Rutas Recetas
Route::get('recetas', 'recetasController@inicio')->name('recetas');

Route::get('recetas/editar/{id}', 'recetasController@editar')->name('recetas.editar');

Route::put('recetas.recetas/{id}', 'recetasController@update')->name('recetas.update');

Route::delete('recetas.eliminar/{id}', 'recetasController@eliminar')->name('recetas.eliminar');

Route::post('recetas.crear', 'recetasController@crear')->name('recetas.crear');
//****************************************************************************************************

//Rutas Categorias
Route::get('categorias', 'categoriasController@inicio')->name('categorias');

Route::get('categorias/editar/{id}', 'categoriasController@editar')->name('categorias.editar');

Route::put('categorias.categorias/{id}', 'categoriasController@update')->name('categorias.update');

Route::delete('categorias.eliminar/{id}', 'categoriasController@eliminar')->name('categorias.eliminar');

Route::post('categorias.crear', 'categoriasController@crear')->name('categorias.crear');
//****************************************************************************************************

//Rutas Recetas Ingredientes
Route::get('personalizar{id}', 'personalizarController@inicio')->name('personalizar');

Route::get('personalizar/editar/{id}', 'personalizarController@editar')->name('personalizar.editar');

Route::put('personalizar.personalizar/{id}', 'personalizarController@update')->name('personalizar.update');

Route::delete('personalizar.eliminar/{id}', 'personalizarController@eliminar')->name('personalizar.eliminar');

Route::post('personalizar.crear', 'personalizarController@crear')->name('personalizar.crear');
//****************************************************************************************************

//Rutas Usuario
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//****************************************************************************************************
