<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItensTable extends Migration
{
    public function up()
    {
        Schema::create('itens', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('categoria')->nullable();
            $table->string('unidade')->nullable();
            $table->decimal('preco_unitario', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('itens');
    }
}
