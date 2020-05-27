<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epks', function (Blueprint $table) {
            $table->id();
            $table->string("titel");
            $table->text("biografie");
            $table->string("category");
            $table->integer("epk_id");
            $table->string('image')->nullable();
            $table->string('youtubeId')->nullable();
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
        Schema::dropIfExists('epks');
    }
}
