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
            $table->json('title');
            $table->json('slogan');
            $table->longText('image');
            $table->longText('cover_image');
            $table->json('food_for_thought');
            $table->json('apply_insurance');
            $table->json('why_work_with_us');
            $table->json('lr');
            $table->json('faq')->nullable();
            $table->json('attachments')->nullable();
            $table->json('additional_benifits')->nullable();
            $table->json('diagrams_and_table')->nullable();
            $table->foreignId('category_id');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_home')->default(false);
            $table->string('slug_url');
            $table->string('quote_machine_name');
            $table->string('claim_machine_name');
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
