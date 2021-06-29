<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsermanagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_manager',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('password');
            $table->string('name');
            $table->string('designation');
            $table->string('email');
            $table->string('status');
            $table->string('create_by')->nullable();
            $table->dateTime('create_date')->useCurrent();
            $table->string('edit_by')->nullable();
            $table->dateTime('edit_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
