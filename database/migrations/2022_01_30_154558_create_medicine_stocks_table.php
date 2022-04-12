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
            $table->string('medicine_name');
            $table->string('manufacturer_name');
            $table->string('supplier_name');
            $table->date('manufactured_date');
            $table->date('expiry_date');
            $table->double('cost_price');
            $table->double('quantity');
            $table->timestamps();
            // $table->foreign('medicine_name')->references('medicine_name')->on('medicines')->onDelete('cascade');
            // $table->foreign('manufacturer_name')->references('manufacturer_name')->on('medicine_manufacturers')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('medicine_stocks');
    }
}
