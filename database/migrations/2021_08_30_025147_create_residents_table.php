<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('number_id')->nullable();
            $table->string('name');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->enum('gender',['Pria','Wanita'])->nullable();
            $table->string('village')->nullable();
            $table->enum('blood_group',['Darah A' , 'Darah B' , 'Darah AB' , 'Darah O'])->nullable();
            $table->longText('address')->nullable();
            $table->integer('rt')->nullable();
            $table->integer('rw')->nullable();
            $table->enum('religion',['Islam','Kristen','Protestan','Buddha','Hindu','Konghucu','Dll'])->nullable();
            $table->enum('marital_status',['Nikah','Single','Janda','Duda'])->nullable();
            $table->string('work')->nullable();
            $table->enum('status',['Hidup','Mati','Pindah'])->nullable()->default('Hidup');
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
        Schema::dropIfExists('resident');
    }
}
