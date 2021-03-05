<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('image');
            $table->string('broucher')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('brand_id');
            $table->integer('price');
            $table->boolean('neg_status')->default(1);
            $table->enum('condition',['brand_new','used','old'])->default('brand_new');
            $table->string('year');
            $table->string('model');
            $table->integer('km');
            $table->string('color');
            $table->integer('cc')->nullable();
            $table->timestamps();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
