<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fakturs', function (Blueprint $table) {
            $table->id();
            $table->string('FakturID');
            $table->string('Category');
            $table->string('Name');
            $table->Integer('Qty');
            $table->string('Address');
            $table->bigInteger('Postcode');
            $table->bigInteger('Total');
            $table->bigInteger('Subtotal');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fakturs');
    }
};
