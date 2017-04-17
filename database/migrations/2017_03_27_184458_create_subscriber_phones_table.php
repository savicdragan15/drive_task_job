<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriberPhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        
        //create table subscriber_phones
        Schema::create('subscriber_phones', function($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('subscriber_id')->unsigned();
            $table->integer('phone');
            $table->timestamps();
        });
        
        //add foreign key reference 
        Schema::table('subscriber_phones', function(Blueprint $table) {
            $table->foreign('subscriber_id')->references('id')->on('subscribers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('subscriber_phones');
    }

}
