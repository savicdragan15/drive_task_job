<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subscriber_name')->nullable();
            $table->string('subscriber_surname')->nullable();
            $table->string('gender')->nullable();
            $table->string('city')->nullable();
            $table->string('head')->nullable();
            $table->date('birthday')->default(date("Y-m-d"));
            $table->string('postalcode', 5)->nullable();
            $table->string('issue')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('subscribers');
    }
}
