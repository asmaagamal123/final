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
    { Schema::create('drug_interactions', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('medicine_id');
        $table->string('interacting_drug_name');
        $table->timestamps();
    
        $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug_interactions');
    }
};
