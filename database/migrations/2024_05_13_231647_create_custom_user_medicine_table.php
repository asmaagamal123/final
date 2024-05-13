<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  // In the create_custom_user_medicine_table migration file
public function up()
{
    Schema::create('custom_user_medicine', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('medicine_id');
        $table->integer('duration');
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('custom_users')->onDelete('cascade');
        $table->foreign('medicine_id')->references('id')->on('custom_medicines')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_user_medicine');
    }
};
