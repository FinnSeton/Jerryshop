<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('joints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('strain_id')->constrained()->onDelete('cascade');
            $table->integer('prijs');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('joints');
    }
};
