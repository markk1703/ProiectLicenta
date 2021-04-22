<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoincremenet();
            $table->string('username')->unique()->nullable()->default(null);
            $table->string('nume')->nullabe(false);
            $table->string('prenume')->nullable(false);
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('imagine')->default('default.jpg');
            $table->unsignedBigInteger('rol_id')->default(2);
            $table->rememberToken()->default(Str::random(10));

            $table->timestamp('email_verified_at')->nullable(); //$table->timestamps(); pt toate
            $table->timestamp('updated_at')->nullable(false)->default(now());
            $table->timestamp('created_at')->nullable(false)->default(now());
            $table->boolean('is_activ')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
