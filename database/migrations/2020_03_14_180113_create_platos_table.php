<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('platos', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->id();
			$table->string('nombre');
			$table->text('descripcion');
			$table->bigInteger('categoria')->unsigned();
			$table->foreign('categoria')->references('id')->on('categoria_platos')->onDelete('cascade')->onDelete('cascade');
			$table->bigInteger('receta')->unsigned();
			$table->foreign('receta')->references('id')->on('recetas')->onDelete('cascade')->onDelete('cascade')->onDelete('cascade');
			$table->bigInteger('restaurante')->unsigned();
			$table->foreign('restaurante')->references('id')->on('restaurantes')->onDelete('cascade');
			$table->integer('precio');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('platos');
	}
}
