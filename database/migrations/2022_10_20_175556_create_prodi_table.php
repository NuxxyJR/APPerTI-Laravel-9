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
        Schema::create('prodi', function (Blueprint $table) {
            $table->bigIncrements('id_prodi');
            $table->string('nm_prodi', 200);
            $table->string('jenjang', 2);
            $table->unsignedBigInteger('id_jurusan')->required();
            $table->foreign('id_jurusan')->references('id_jur')->on('jurusan')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prodi', function (Blueprint $table) {
            $table->dropForeign(['id_jurusan']);
            $table->dropIfExists('prodi');
        });
    }
};
