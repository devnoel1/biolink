<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pixels_id')->nullable();
            $table->string('type')->nullable();
            $table->string('url')->nullable();
            $table->string('subtype')->nullable();
            $table->string('location_url')->nullable();
            $table->bigInteger('clicks')->default('0');
            $table->longText('settings')->default('{}');
            $table->date('start_date')->nullable();
            $table->date('stop_date')->nullable();
            $table->tinyInteger('is_enabled')->default('1');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
