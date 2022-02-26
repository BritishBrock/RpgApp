<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateCharacterClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_classes', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("name",30);
            $table->timestamps();
            
            $table->unique("name");
        });
        DB::table('character_classes')->insert(
            array(
                'name' => 'fighter',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_classes');
    }
}
