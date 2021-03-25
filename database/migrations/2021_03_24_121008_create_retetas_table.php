<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retete', function (Blueprint $table) {
            $table->id();
            $table->string('denumire')->nullable(false);
            $table->string('ingrediente')->nullable(false);
            $table->string('mod_de_preparare')->nullable(false);
            $table->string('categorii')->nullable(true);
            $table->string('imagine_principala')->nullable(true);
            $table->string('imagini')->nullable(true);
            $table->string('URL_video')->nullable(true);
            $table->integer('utilizator_id')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retete');
    }
}
