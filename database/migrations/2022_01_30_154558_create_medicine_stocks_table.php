<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('medicine_id')->nullable();
            $table->unsignedBigInteger('medicine_manufacturer_id')->nullable();
            $table->string('supplier_name')->nullable();
            $table->dateTime('manufactured_date')->nullable();
            $table->dateTime('expiry_date')->nullable();
            $table->double('cost_price')->nullable();
            $table->double('quantity')->nullable();
            $table->timestamps();
            $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');
            $table->foreign('medicine_manufacturer_id')->references('id')->on('medicine_manufacturers')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('medicine_stocks');
    }
}