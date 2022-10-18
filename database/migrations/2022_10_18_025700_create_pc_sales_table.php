<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_sales', function (Blueprint $table) {
            $table->id();
            $table->string('c_name');
            $table->string('c_phone')->nullable();
            $table->date('date');
            $table->string('cpu')->nullable();
            $table->string('board')->nullable();
            $table->string('memory')->nullable();
            $table->string('hdd')->nullable();
            $table->string('graphic')->nullable();
            $table->string('power_supply')->nullable();
            $table->string('drive')->nullable();
            $table->string('casing')->nullable();
            $table->string('monitor')->nullable();
            $table->string('ups')->nullable();
            $table->string('keyboard_mouse')->nullable();
            $table->string('antivirus')->nullable();
            $table->string('other')->nullable();
            $table->string('c_by')->nullable();
            $table->string('u_by')->nullable();
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
        Schema::dropIfExists('pc_sales');
    }
}