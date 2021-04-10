<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->bigInteger('wallet_id')->unsigned();
            $table->foreign('wallet_id')
                ->references('id')
                ->on('wallets');

            $table->bigInteger('bundle_id')->unsigned();
            $table->foreign('bundle_id')
                ->references('id')
                ->on('bundles');

            $table->string('trans_ref');
            $table->float('amount');
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
        Schema::dropIfExists('payments');
    }
}
