<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('anvisa')->nullable();
            $table->string('sei')->nullable();
            $table->date('dtocorrencia');
            $table->string('setor');
            $table->string('profissional')->nullable();
            $table->string('registroanvisa')->nullable();
            $table->foreignId('brand_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->string('lote')->nullable();
            $table->string('validade')->nullable();
            $table->text('queixa');
            $table->foreignId('user_id')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
