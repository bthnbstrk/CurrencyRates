<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->char('symbol', 1)->nullable();
            $table->tinyText('shortCode')->nullable();
            $table->float('value', 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
