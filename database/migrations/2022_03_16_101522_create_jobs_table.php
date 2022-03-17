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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->string('position_burmese');
            $table->string('position_chinese');
            $table->string('department');
            $table->string('department_burmese');
            $table->string('department_chinese');
            $table->longText('description');
            $table->longText('description_burmese');
            $table->longText('description_chinese');
            $table->string('due');
            $table->string('due_burmese');
            $table->string('due_chinese');
            $table->date('due_date')->nullable();
            $table->string('slug_url');
            $table->boolean('is_vacant')->default(true);
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
        Schema::dropIfExists('jobs');
    }
};
