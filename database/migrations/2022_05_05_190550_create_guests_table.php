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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('pesel');
            $table->string('ulica');
            $table->string('miasto');
            $table->string('nr_budynku');
            $table->string('kod_pocztowy');
            $table->string('miejscowosc');
            $table->string('kraj');
            $table->string('telefon');
            $table->string('email');
            $table->string('haslo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guests');
    }
};
