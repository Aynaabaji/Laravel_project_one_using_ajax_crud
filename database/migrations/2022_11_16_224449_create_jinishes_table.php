<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jinishes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('user');
            $table->string('email')->default('no_mail@example.com');
            $table->string('barcode')->default('000');
            $table->integer('size')->default(0);
            $table->integer('quantity')->default(0);
            $table->string('color')->default('#000');
            $table->float('price')->default(0.00);
            $table->integer('stock')->default(1);
            $table->integer('stock_Count')->default(0);
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
        Schema::dropIfExists('jinishes');
    }
};