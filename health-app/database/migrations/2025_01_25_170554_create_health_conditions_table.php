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
        Schema::create('health_conditions', function (Blueprint $table) {
            $table->id(); // This creates the primary key.
            $table->unsignedBigInteger('user_id')->nullable(); // This creates the foreign key.
            $table->string('name'); // It creates a Varchar(255) column named "name" for condition name.
            $table->text('description'); // It creates a "description" column.
            $table->timestamps(); // This adds created_at and updated_at columns.
            // Foreign Key constrain to link user_id to health_condition table to id in the users table.
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_conditions');
    }
};
