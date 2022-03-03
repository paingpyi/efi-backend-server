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
            $table->string('title_burmese');
            $table->longText('content_burmese');
            $table->string('image')->nullable();
            $table->string('url_slug')->nullable();
            $table->enum('status', ['published', 'draft', 'unpublished']);
            $table->foreignId('category_id');
            $table->foreignId('author_id');
            $table->boolean('featured')->default(false);
<<<<<<< HEAD
            $table->string('related_product_id')->nullable();
=======
            $table->longText('products')->nullable();
>>>>>>> dev
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
