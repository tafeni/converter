<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->bigInteger('wallet_id')->unsigned();
            $table->foreign('wallet_id')
                ->references('id')
                ->on('wallets');
            $table->string('transid',150);
            $table->string('state',50);
            $table->text('message');
            $table->string('code_old',50);
            $table->string('code_new',50);
            $table->string('code_from',50);
            $table->string('code_to',50);
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
        Schema::dropIfExists('conversions');
    }
}
