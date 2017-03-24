<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->float('size');
            $table->string('fileName');
            $table->string('fileExtension');
            $table->string('name');
            $table->string('description');
            $table->string('keywords');
            $table->string('url');
            $table->string('avatar');
            $table->softDeletes();

            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('files');
    }
}
