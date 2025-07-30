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
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->longtext('description')->nullable();
            $table->string('image')->nullable();
            $table->string('sku')->nullable();
            $table->integer('stock')->nullable();
            $table->decimal('main_price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->date('sale_start_date')->nullable();
            $table->date('sale_end_date')->nullable();
            $table->string('type')->default('simple'); // Product type (simple, variable)
            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_saleable')->default(true);
            $table->timestamps();
        });
        Schema::create('product_similar', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('similar_product_id');
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
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_similar');
    }
};
