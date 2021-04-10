<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrendingcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trendingcodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('influencer', 150);
            $table->string('code', 50);
            $table->string('booky', 50);
            $table->float('odd');
            $table->boolean('status')->default(true);
            $table->date('day');
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
        Schema::dropIfExists('trendingcodes');
    }
}
