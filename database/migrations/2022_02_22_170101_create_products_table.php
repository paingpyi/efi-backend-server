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
            $table->string('title');
            $table->string('slogan');
            $table->longText('description');
            $table->longText('benefits_block');
            $table->longText('benefits_image');
            $table->longText('table_block')->nullable();
            $table->longText('why_block')->nullable();
            $table->longText('downloadable_block')->nullable();
            $table->longText('applythis_block')->nullable();
            $table->string('title_burmese');
            $table->string('slogan_burmese');
            $table->longText('description_burmese');
            $table->longText('benefits_block_burmese');
            $table->longText('table_block_burmese')->nullable();
            $table->longText('why_block_burmese')->nullable();
            $table->longText('downloadable_block_burmese')->nullable();
            $table->longText('applythis_block_burmese')->nullable();
            $table->string('product_photo', 2048)->nullable();
            $table->foreignId('category_id');
            $table->boolean('is_active')->default(true);
            $table->string('slug_url');
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
    }
};
