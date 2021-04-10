<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookmakersTable extends Migration
{

    public function up()
    {
        Schema::create('bookmakers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('admin_id')->unsigned();
            $table->foreign('admin_id')
                ->references('id')
                ->on('admins');

            $table->string('name');
            $table->string('slug')->unique();
            $table->boolean('status')->default(true);
            $table->float('amount');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('bookmakers');
    }
}
