<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeminarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminar', function (Blueprint $table) {
            $table->string("id")->primary();
            $table->string("nama_seminar");
            $table->text("deskripsi");
            $table->date("tanggal_mulai");
            $table->date("tanggal_selesai");
            $table->string("lokasi");
            $table->string("gambar");
            $table->integer("kuota");
            $table->boolean("selesai")->default(0);
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
        Schema::dropIfExists('seminar');
    }
}
