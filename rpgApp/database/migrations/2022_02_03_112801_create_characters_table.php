<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            //campos
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('character_class_id');
            $table->foreignId('idInventory')->nullable()->unique();
            $table->string('name',100);
            $table->integer('gold')->default(0);
            $table->integer('xp')->default(0);
            $table->integer('xpCap')->default(20);
            $table->integer('level')->default(1);
            $table->softDeletes();
            $table->timestamps();
            
            //restricciones
            $table->unique(['user_id','name']);
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('character_class_id')->references('id')->on('character_classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
    
    
}
