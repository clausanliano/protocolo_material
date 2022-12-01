<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('recibos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entregador_id')->constrained('users');
            $table->foreignId('recebedor_id')->nullable()->references('id')->on('users');
            $table->text('observacao')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recibos');
    }
};
