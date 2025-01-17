<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('strains', function (Blueprint $table) {
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
    

    public function down(): void
    {
        Schema::dropIfExists('strains');
    }
};
