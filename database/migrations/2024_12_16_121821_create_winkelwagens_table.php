<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWinkelwagensTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('winkelwagen', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->string('merk');
            $table->string('soort');
            $table->integer('thc');
            $table->integer('cbd');
            $table->decimal('prijs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('winkelwagen');
    }
}
