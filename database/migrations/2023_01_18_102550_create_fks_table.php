<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

       /**
        *Schema::table('students', function (Blueprint $table) {
        *    $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade') ->onDelete('cascade');
*
        *});
        *Schema::table('admins', function (Blueprint $table) {
        *    $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade') ->onDelete('cascade');
*
        *});
        *Schema::table('instructors', function (Blueprint $table) {
        *    $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade') ->onDelete('cascade');
*
        *});
*
        */


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fks');
    }
};
