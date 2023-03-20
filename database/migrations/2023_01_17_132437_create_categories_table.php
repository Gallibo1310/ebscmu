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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('desc')->nullable();
            $table->timestamps();
        });

        DB::table('categories')->insert([
            ['type' => 'Glassware'],
            ['type' => 'Plasticware'],
            ['type' => 'Metalware'],
            ['type' => 'Electrical equipment'],
            ['type' => 'Safety equipment'],
            ['type' => 'Consumables'],
            ['type' => 'Instruments and equipment'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
