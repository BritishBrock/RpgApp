<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('character_id');
            $table->timestamps();
            $table->unique(['character_id']);
            $table->foreign('character_id')->references("id")->on('characters');
         
         
        });
        Schema::table('characters', function (Blueprint $table) {
            $table->foreign('idInventory')->references("id")->on('inventories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
