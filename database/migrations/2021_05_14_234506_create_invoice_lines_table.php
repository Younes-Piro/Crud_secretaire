<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('services_id');
            //$table->unsignedInteger('invoice_id');
            $table->integer('invoiceLine_discount');
            $table->integer('invoiceLine_service_quantity');
            $table->double('invoiceLine_price_per_unit');
            $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');
            //$table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->foreignId('invoice_id')
                  ->constrained()
                  ->onDelete('cascade');
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
        Schema::dropIfExists('invoice_lines');
    }
}
