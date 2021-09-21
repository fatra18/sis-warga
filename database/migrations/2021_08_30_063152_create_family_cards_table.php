<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_cards', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('family_card_number');
            $table->foreignId('residents_id');
            $table->string('village');
            $table->integer('rt');
            $table->integer('rw');
            $table->longText('address');
            $table->foreignId('regencies_id')->nullable();
            $table->foreignId('districts_id')->nullable();
            $table->foreignId('provinces_id')->nullable();
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
        Schema::dropIfExists('family_card');
    }
}
