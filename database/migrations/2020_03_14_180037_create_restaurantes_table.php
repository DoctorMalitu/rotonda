<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('restaurantes', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->id();
			$table->string('nombre');
			$table->string('direccion');
			$table->text('descripcion');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('restaurantes');
	}
}
