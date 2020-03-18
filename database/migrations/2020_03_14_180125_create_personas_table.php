<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('personas', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->id();
			$table->string('nombre');
			$table->bigInteger('id_rol')->unsigned();
			$table->foreign('id_rol')->references('id')->on('rols')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('personas');
	}
}
