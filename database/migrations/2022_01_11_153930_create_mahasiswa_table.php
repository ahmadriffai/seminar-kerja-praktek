<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string("nim", 10)->primary();
            $table->string("nama");
            $table->string("prodi");
            $table->integer("angkatan");
            $table->string("nomer_telp", 15)->nullable();
            $table->string("user_id")->nullable();
            $table->foreign("user_id")
                ->references("id")->on("user");
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
        Schema::dropIfExists('mahasiswa');
    }
}
