<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ApplyForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            $table->foreign('rol_id')->references('id')->on('roluri')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('retete', function(Blueprint $table){
            $table->foreign('utilizator_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('valori_nutritionale', function(Blueprint $table){
            $table->foreign('ingredient_id')->references('id')->on('ingrediente')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('followships', function(Blueprint $table){
            $table->foreign('user1_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user2_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('notificari', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}