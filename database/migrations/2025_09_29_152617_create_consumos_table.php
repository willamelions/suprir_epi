<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('consumos', function (Blueprint $table) {
            $table->id();

            // Cada consumo acontece dentro de uma obra
            $table->foreignId('obra_id')->constrained('obras')->onDelete('cascade');

            // Item consumido (EPI ou outro)
            $table->foreignId('item_id')->constrained('itens')->onDelete('cascade');

            // Quantidade consumida
            $table->integer('quantidade');

            // Quem retirou o EPI
            $table->string('responsavel')->nullable();
            $table->string('cpf_funcionario')->nullable();

            // Data/hora do consumo
            $table->dateTime('data_consumo')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consumos');
    }
};
