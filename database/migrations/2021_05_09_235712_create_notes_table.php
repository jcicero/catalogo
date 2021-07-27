<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('anvisa')->nullable();
            $table->string('sei')->nullable();
            $table->date('dtocorrencia');
            $table->string('setor');
            $table->string('profissional')->nullable();
            $table->string('registroanvisa')->nullable();
            $table->foreignId('brand_id')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->string('lote')->nullable();
            $table->string('validade')->nullable();
            $table->text('queixa');
            $table->text('email');
            $table->text('produtodesc');
            $table->text('marca');
            $table->boolean('isAceito');
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
