<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingcartTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Schema::create(config('cart.database.table'), function (Blueprint $table) {
        //     $table->increments('id'); //not part
        //     $table->string('identifier');
        //     $table->string('instance');
        //     $table->longText('content');
        //     $table->nullableTimestamps(); 

        //     $table->primary(['identifier', 'instance'],'shopcart_pry');
        //    $table->unique(['identifier', 'instance'],'shopcart_unique');
        // });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        //Schema::drop(config('cart.database.table'));
    }
}
