<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailboxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailbox', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',80)->default('anonimo');
            $table->string('mail',45);
            $table->string('telephone',12)->nullable(true);
            $table->string('category_mailbox');
            $table->longText('description');
            $table->timestamps();

            $table->foreign('category_mailbox')
                ->references('category_mailbox')->on('categories_mailbox')
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
        Schema::dropIfExists('mailbox');
    }
}
