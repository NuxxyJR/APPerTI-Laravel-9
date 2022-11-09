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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('nim', 10)->primary();
            $table->string('nm_mhs', 50);
            $table->string('jenis_kelamin', 1);
            $table->date('tgl_lahir')->nullable();
            $table->string('tpt_lahir', 30)->nullable();
            $table->text('alamat_mhs')->nullable();
            $table->string('no_hp', 13)->nullable();
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
};
