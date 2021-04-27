<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeCulumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('style')->nullable();
            $table->string('shop')->nullable();//追加
            $table->string('location')->nullable();//追加
            $table->text('comment')->nullable();//追加
            $table->bigInteger('age')->nullable();//追加
            $table->string('image')->index('index_image')->nullable();
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
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn('style');
             $table->dropColumn('shop');
             $table->dropColumn('location');
             $table->dropColumn('comment');
             $table->dropColumn('age');
             $table->dropColumn('image');
             $table->dropColumn('deleted_at');
        });
    }
}
