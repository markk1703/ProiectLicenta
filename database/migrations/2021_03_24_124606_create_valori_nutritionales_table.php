<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValoriNutritionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valori_nutritionale', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ingredient_id')->unique();
            $table->string('calorii');
            $table->string('grasimi');
            $table->string('grasimi_saturate');
            $table->string('glucide');
            $table->string('proteine');
            $table->string('sare');
            $table->string('calciu');
            $table->timestamp('updated_at')->nullable(false)->default(now());
            $table->timestamp('created_at')->nullable(false)->default(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valori_nutritionale');
    }
}
