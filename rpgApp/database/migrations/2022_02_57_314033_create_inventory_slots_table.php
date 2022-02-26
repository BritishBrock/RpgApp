<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventorySlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_slots', function (Blueprint $table) {
            $table->id();
            $table->string("slotNum",20);
            $table->unsignedBigInteger('idInventory');
            $table->timestamps();
            
            $table->foreign('idInventory')->references('id')->on('inventories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_slots');
    }
}
