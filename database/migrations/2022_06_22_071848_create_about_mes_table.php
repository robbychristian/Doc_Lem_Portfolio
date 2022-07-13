<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutMesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_mes', function (Blueprint $table) {
            $table->id();
            $table->string('first_paragraph', 1000);
            $table->string('second_paragraph', 1000);
            $table->string('third_paragraph', 1000);
            $table->string('fourth_paragraph', 1000);
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
        Schema::dropIfExists('about_mes');
    }
}
