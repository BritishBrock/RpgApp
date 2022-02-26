<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassAbilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_abilities', function (Blueprint $table) {
            $table->id()->autoIncrement();
            
            $table->unsignedBigInteger('character_class_id');
            $table->unsignedBigInteger('abilities_id');
            $table->timestamps();
            $table->foreign('character_class_id')->references('id')->on('character_classes');
            $table->foreign('abilities_id')->references('id')->on('abilities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_abilities');
    }
}
