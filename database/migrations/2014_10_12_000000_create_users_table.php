<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('style')->nullable();
            $table->string('shop')->nullable();//追加
            $table->integer('postal_code')->nullable();//追加
            $table->string('address')->nullable();//追加
            $table->text('comment')->nullable();//追加
            $table->bigInteger('age')->nullable();//追加
            $table->string('image')->index('index_image')->nullable();
            $table->softDeletesTz('deleted_at', 0);
            $table->unsignedBigInteger('tel')->nullable()->default(null);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
