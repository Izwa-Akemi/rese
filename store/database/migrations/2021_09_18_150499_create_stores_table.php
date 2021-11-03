<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('owners')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('genre_id')->unsigned();
            $table->foreign('genre_id')->references('id')->on('genres')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->text('detail');
            $table->text('filename');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
