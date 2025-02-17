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
        Schema::create('turkeys', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->enum('status', ['healthy', 'injured', 'dead'])->default('healthy');
            $table->decimal('weight', 3, 1);
            $table->timestamp('birthdate')->default('now');
            $table->unsignedBigInteger('ability_id')->nullable();
            $table->foreign('ability_id')->references('id')->on('abilities')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turkeys');
    }
};
