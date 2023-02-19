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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('product_name')->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();            
            $table->text('image')->nullable();
            $table->string('price')->nullable();
            $table->string('discounted_price')->nullable();
            $table->string('discount')->nullable();
            $table->text('price_description')->nullable();
            $table->text('description')->nullable();
            $table->text('key_benifits')->nullable();
            $table->text('direction_for_usage')->nullable();
            $table->text('other_information')->nullable();            
            $table->enum('status', [1,2])->default(1)->comment('1 for active 0 for inactive');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
};
