<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('Email')->unique();
            $table->unsignedBigInteger('tel')->nullable()->default(null);
            $table->text('style')->nullable();
            $table->string('shop')->nullable();//追加
            $table->string('location')->nullable();//追加
            $table->text('comment')->nullable();//追加
            $table->bigInteger('age')->nullable();//追加
            $table->timestampsTz(0);
            $table->softDeletesTz('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
