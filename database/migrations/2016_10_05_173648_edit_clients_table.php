<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('clients', function ($table) {
        $table->integer('producer_id')->after('contact_id');
        $table->date('start_date')->after('producer_id');;
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('clients', function ($table) {
        $table->dropColumn('producer_id');
        $table->dropColumn('start_date');
      });
    }
}
