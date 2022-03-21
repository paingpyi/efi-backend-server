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
        Schema::create('c_s_r_s', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->longText('content');
            $table->string('title_burmese');
            $table->string('location_burmese');
            $table->longText('content_burmese');
            $table->string('title_chinese');
            $table->string('location_chinese');
            $table->longText('content_chinese');
            $table->longText('images');
            $table->string('url_slug');
            $table->enum('status', ['published', 'draft', 'unpublished']);
            $table->foreignId('author_id');
            $table->boolean('featured')->default(false);
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
        Schema::dropIfExists('c_s_r_s');
    }
};
