<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetasIngredientesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('recetas_ingredientes', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->id();
			$table->bigInteger('id_ingrediente')->unsigned();
			$table->foreign('id_ingrediente')->references('id')->on('ingredientes');
			$table->bigInteger('id_receta')->unsigned();
			$table->foreign('id_receta')->references('id')->on('recetas')->onDelete('cascade');
			$table->Integer('cantidad');
			$table->Integer('estado');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('recetas_ingredientes');
	}
}
