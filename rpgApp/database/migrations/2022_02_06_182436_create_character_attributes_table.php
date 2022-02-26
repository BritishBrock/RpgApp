<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_attributes', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('character_id');
            $table->string("name",20);
            $table->integer('value')->default(5);
            $table->timestamps();
            
            
            $table->foreign('character_id')->references('id')->on('characters')->onDelete('cascade');
            
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_attributes');
    }
}
