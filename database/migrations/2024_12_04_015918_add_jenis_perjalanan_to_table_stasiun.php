<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJenisPerjalananToTableStasiun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stasiun', function (Blueprint $table) {
            $table->enum('jenis_perjalanan', ['local', 'intercity'])->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stasiun', function (Blueprint $table) {
            $table->dropColumn('jenis_perjalanan'); 
        });
    }
}
