<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('author_id');
            $table->string('name');
            $table->string('target');
            $table->integer('status');
            $table->string('description');
            $table->integer('column_id');
            $table->integer('total_users')->default(0);
            $table->integer('priorityStatus')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
