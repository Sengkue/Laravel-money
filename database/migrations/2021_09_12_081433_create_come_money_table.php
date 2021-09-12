<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComeMoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('come_money', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('money_no');
            $table->string('money_explain');
            $table->string('money_date');
            $table->string('money_notice');
            $table->softDeletes();
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
        Schema::dropIfExists('come_money');
    }
}
