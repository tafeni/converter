<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBundlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bundles', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('admin_id')->unsigned();
            $table->foreign('admin_id')
                ->references('id')
                ->on('admins');

            $table->string('name',50);
            $table->float('cost');
            $table->integer('value');
            $table->string('desc',100);
            $table->boolean('status')->default(true);
            $table->boolean('favorite')->default(false);
            $table->integer('duration');
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
        Schema::dropIfExists('bundles');
    }
}
