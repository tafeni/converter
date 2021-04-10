<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBundlehistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bundlehistories', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('bundle_id')->unsigned();
            $table->foreign('bundle_id')
                ->references('id')
                ->on('bundles');

            $table->bigInteger('admin_id')->unsigned();
            $table->foreign('admin_id')
                ->references('id')
                ->on('admins');

            $table->float('cost');
            $table->float('value');
            $table->integer('duration');
            $table->boolean('status')->default(true);

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
        Schema::dropIfExists('bundlehistories');
    }
}
