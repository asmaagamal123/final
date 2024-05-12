<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // In the migration file created for the pivot table
public function up()
{
    Schema::create('medicine_user', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('medicine_id');
        $table->unsignedBigInteger('user_id');
        $table->integer('duration'); // duration of when this medicine should be taken
        $table->timestamps();

        $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_user');
    }
};
