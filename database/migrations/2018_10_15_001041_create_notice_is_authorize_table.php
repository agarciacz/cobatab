<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticeIsAuthorizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice_is_authorize', function (Blueprint $table) {
            $table->unsignedInteger('notice');
            $table->string('user', 15);
            $table->boolean('is_authorized');
            $table->timestamps();
            $table->foreign('notice')
                ->references('id')->on('notices')
                ->onDelete('cascade');
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
        Schema::dropIfExists('notice_is_authorize');
    }
}
