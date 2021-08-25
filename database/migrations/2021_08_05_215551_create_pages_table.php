<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_category_id');
            $table->string('url')->nullable();
            $table->longText('description')->nullable();
            $table->string('content')->nullable();
            $table->string('type')->nullable();
            $table->string('position')->nullable();
            $table->integer('order')->default('0');
            $table->bigInteger('total_views')->default('0');
            $table->date('date')->nullable();
            $table->date('last_date')->nullable();
            $table->timestamps();

            $table->foreign('page_category_id')->references('id')->on('page_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
