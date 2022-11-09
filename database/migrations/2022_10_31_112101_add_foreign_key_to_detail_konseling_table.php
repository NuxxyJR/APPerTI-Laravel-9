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
        Schema::table('detail_konseling', function (Blueprint $table) {
            $table->foreign('id_konseling')->references('id')->on('konseling')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_konseling', function (Blueprint $table) {
            $table->dropForeign(['id_konseling']);
        });
    }
};
