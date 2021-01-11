<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 191);
            $table->string('company_adress', 191)->nullable();
            $table->string('company_tel', 191)->nullable();
            $table->string('company_mail', 191)->nullable();
            $table->string('contact_name', 191)->nullable();
            $table->string('contact_tel', 191)->nullable();
            $table->string('contact_mail', 191)->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}
