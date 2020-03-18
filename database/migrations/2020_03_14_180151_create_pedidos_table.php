<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('pedidos', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->id();
			$table->bigInteger('id_persona')->unsigned();
			$table->foreign('id_persona')->references('id')->on('personas')->onDelete('cascade');
			$table->integer('precio_neto');
			$table->date('fecha');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('pedidos');
	}
}
