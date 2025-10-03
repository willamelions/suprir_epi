<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstoquesTable extends Migration
{
    public function up()
    {
        Schema::create('estoques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obra_id')->constrained('obras')->onDelete('cascade');
            $table->foreignId('item_id')->constrained('itens')->onDelete('cascade');
            $table->integer('quantidade')->default(0);
            $table->integer('saldo_minimo')->default(0);
            $table->timestamps();

            $table->unique(['obra_id', 'item_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('estoques');
    }
}
