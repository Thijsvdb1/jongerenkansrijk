<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJongerenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jongeren', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('voornaam');
            $table->char('tussenvoegsel');
            $table->char('achternaam');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jongeren');
    }
}
