<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('subtitle');
            $table->longText('description');
            $table->string('cover_image', 100);
            $table->string('user', 15);
            $table->date('start_date_publication');
            $table->date('end_date_publication');
            $table->timestamps();

            $table->foreign('user')
                ->references('user')->on('users')
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
        Schema::dropIfExists('notice');
    }
}
