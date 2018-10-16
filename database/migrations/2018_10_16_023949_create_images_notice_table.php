<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesNoticeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_notice', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('notice');
            $table->string('image');
            $table->string('image_title')->nullable();
            $table->timestamps();

            $table->foreign('notice')
                ->references('id')->on('notices')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images_notice');
    }
}
