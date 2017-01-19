<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('terms', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('contract_id');
          $table->integer('provider_id');
          $table->integer('service_id');
          $table->timestamp('start_date');
          $table->timestamp('end_date');
          $table->float('amount');
          $table->string('frequency');
          $table->integer('producer1_id');
          $table->float('producer1_split');
          $table->integer('producer2_id');
          $table->float('producer2_split');
          $table->timestamps();
          $table->softDeletes();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('terms');
    }
}
