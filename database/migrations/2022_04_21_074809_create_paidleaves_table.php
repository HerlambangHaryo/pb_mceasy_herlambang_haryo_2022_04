<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaidleavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paidleaves', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id'); 
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->smallInteger('lama_cuti');
            $table->integer('paidleavereason_id');
            $table->string('keterangan');

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
        Schema::dropIfExists('paidleaves');
    }
}
