<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('furnisher_id')->nullable()->unsigned();
            $table->double('price', 255)->nullable();
            $table->enum('type', ['LAPTOP', 'DESKTOP', 'ACCESSOIRES'])->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->integer('quantity')->default(0);
            $table->string('main_image')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->timestamps();
            $table->foreign('furnisher_id')->references('id')->on('furnishers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
