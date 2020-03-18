<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePedidosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('detalle_pedidos', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->id();
			$table->bigInteger('id_pedido')->unsigned();
			$table->foreign('id_pedido')->references('id')->on('pedidos')->onDelete('cascade');
			$table->bigInteger('id_plato')->unsigned();
			$table->foreign('id_plato')->references('id')->on('platos')->onDelete('cascade');
			$table->Integer('cantidad');
			$table->Integer('precio');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('detalle_pedidos');
	}
}
