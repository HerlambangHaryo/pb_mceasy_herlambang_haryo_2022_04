<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('nomor_induk');
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->text('alamat')->nullable();
            $table->text('kota')->nullable();
            $table->date('tanggal_bergabung');
            $table->smallInteger('akumulasi_cuti');
            $table->timestamps();
                $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
