<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->string('image');
	        $table->string('events');
	        $table->json('rate');
	        $table->boolean('shop');
	        $table->string('description');
	        $table->date('open');
	        $table->integer('like');
	        $table->integer('position');
	        $table->string('url');
	        $table->boolean('power_up');
	        $table->integer('server_id')->unsigned(); //название поля долно быть имя  модели_id то есть server_id не serverS_id
	        $table->foreign('server_id')->references('id')->on('servers');
	        $table->softDeletes(); //когда удалено
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
        Schema::dropIfExists('descriptions');
    }
}
