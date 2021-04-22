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
            $table->unsignedBigInteger('utilizator_id')->nullable(false)->default(Auth::id());
            $table->string('denumire')->nullable(false);
            $table->text('ingrediente')->nullable(false);
            $table->text('mod_de_preparare')->nullable(false);
            $table->string('categorii')->nullable(true);
            $table->string('tags')->nullable(true);
            $table->string('imagine_principala')->nullable(true);
            $table->text('imagini')->nullable(true);
            $table->double('rating_avg')->nullable(true);
            $table->string('URL_video')->nullable(true);
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
