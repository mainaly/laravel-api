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
            $table->increments('id');
            $table->string('card_image')->nullable();
            $table->string('desc_image')->nullable();
            $table->string('events')->nullable();
            $table->string('rates');
            $table->boolean('shop')->nullable();
            $table->string('card_desc');
            $table->string('server_desc');
            $table->string('server_info')->nullable();
            $table->string('server_rules');
            $table->timestamp('open')->nullable();
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
