<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->default('-');
            $table->string('stock_id');
            $table->string('location')->default('-');
            $table->string('quantity')->default('0');
            $table->string('supplier')->default('-');
            $table->string('notification')->default('0');
            $table->string('notificationUser')->nullable();
            $table->string('notificationQuantity')->nullable();
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
        Schema::dropIfExists('stock');
    }
}
