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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content');
            $table->json('images');
            $table->string('url_slug')->nullable();
            $table->enum('status', ['published', 'draft', 'unpublished']);
            $table->foreignId('main_category');
            $table->json('category_id');
            $table->foreignId('author_id');
            $table->boolean('featured')->default(false);
            $table->boolean('promoted')->default(false);
            $table->json('related_products')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
