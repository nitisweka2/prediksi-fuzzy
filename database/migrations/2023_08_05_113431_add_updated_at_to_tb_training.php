<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUpdatedAtToTbTraining extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_training', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
            $table->id('id_training');
            $table->date('tanggal');
            $table->integer('permintaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_training', function (Blueprint $table) {
            //
        });
    }
}
