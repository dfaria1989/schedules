<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUserComplexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_user_complexes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('complex_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('admin_user_complexes', function (Blueprint $table) {
          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('complex_id')->references('id')->on('complexes');

          $table->index(['user_id', 'complex_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_user_complexes', function (Blueprint $table) {
          $table->dropIndex(['user_id', 'complex_id']);
          $table->dropForeign(['user_id']);
          $table->dropForeign(['complex_id']);
        });

        Schema::dropIfExists('admin_user_complexes');
    }
}
