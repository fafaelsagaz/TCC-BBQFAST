<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoRecusalsTable extends Migration
{
    public function up()
    {
        Schema::create('pedido_recusals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('CD_PEDIDO');
            $table->unsignedBigInteger('user_id');
            // Outras colunas, se necessário

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedido_recusals');
    }
}

