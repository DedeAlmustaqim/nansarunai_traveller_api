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
        // Schema::create('contents', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->text('content');
        //     $table->string('category');
        //     $table->string('andress');
        //     $table->string('sub_category');
        //     $table->string('img_path')->nullable();
        //     $table->decimal('latitude', 10, 7);
        //     $table->decimal('longitude', 10, 7);
        //     $table->unsignedBigInteger('category_id');
        //     $table->unsignedBigInteger('sub_category_id');
        //     $table->timestamps();

        //     $table->foreign('category_id')->references('id')->on('categories');
        //     $table->foreign('sub_category_id')->references('id')->on('sub_categories');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
};
