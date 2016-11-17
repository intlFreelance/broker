<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSplitToContractPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('contract_payments', function ($table) {
        $table->integer('producer_id')->after('frequency');
        $table->float('producer_split')->after('producer_id');
        $table->string('provider')->after('producer_split');
        $table->string('service')->after('provider');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('contract_payments', function ($table) {
        $table->dropColumn('producer_id');
        $table->dropColumn('producer_split');
        $table->dropColumn('service');
        $table->dropColumn('provider');
      });
    }
}
