<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovalItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approvalitems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_approval');
            $table->float('amount', 10, 2);
            $table->text('keterangan');
            $table->text('attachment');
            $table->text('image');
            $table->text('col_c');
            $table->text('col_d');
            $table->text('note');
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
        Schema::dropIfExists('approvalitems');
    }
}
