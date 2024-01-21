<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id("ISBN");
            $table->string("id");
            $table->string("title")->nullable();
            $table->string("link")->nullable();
            $table->string("image");
            $table->float("price");
            $table->text("description");
            $table->integer("pages");
        });
        Schema::create('itemchars',function(Blueprint $table){
            $table->foreignId("ISBN");
            $table->integer("year");
            $table->string("author");
            $table->string("language");
            $table->string("type");
        });
        Schema::create('itemquantities', function (Blueprint $table) {
            $table->foreignId("ISBN");
            $table->string("availability");
            $table->integer("quantity")->nullable(true)??NULL;
            $table->string("returnable");
        });
        Schema::create('chart',function(Blueprint $table){
            $table->id("id")->autoIncrement();
            $table->string("title")->nullable();
            $table->foreignId("ISBN");
            $table->float("price");
            $table->integer("year");
            $table->integer("quantity");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item');
        Schema::dropIfExists('itemchars');
        Schema::dropIfExists('itemquantities');
        Schema::dropIfExists('chart');
    }
};
