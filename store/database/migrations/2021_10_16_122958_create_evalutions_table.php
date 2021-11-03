<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvalutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evalutions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('store_id')->unsigned();
            $table->foreign('store_id')->references('id')->on('stores')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('reserve_id')->unsigned();
            $table->foreign('reserve_id')->references('id')->on('reservations')->onUpdate('CASCADE')->onDelete('CASCADE');   
            $table->integer('stars')->default(0)->comment('星');
            $table->text('comment')->comment('コメント');
    
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
        Schema::dropIfExists('evalutions');
    }
}
