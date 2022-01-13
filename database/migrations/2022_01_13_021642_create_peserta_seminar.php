<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaSeminar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_seminar', function (Blueprint $table) {
            $table->id();
            $table->string("nim",10);
            $table->string("seminar_id");
            $table->foreign("nim")
                ->references("nim")->on("mahasiswa");
            $table->foreign("seminar_id")
                ->references("id")->on("seminar");
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
        Schema::dropIfExists('peserta_seminar');
    }
}
