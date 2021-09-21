<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_number');
            $table->string('name_comers');
            $table->enum('gender',['Pria','Wanita']);
            $table->date('arrival_date');
            $table->foreignId('residents_id');
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
        Schema::dropIfExists('comers');
    }
}
