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
    Schema::create('properties', function (Blueprint $table) {
        $table->id('property_id');
        $table->foreignId('owner_id')->constrained('users')->onDelete('cascade');

        $table->enum('property_type', ['BODIM', 'ANNEX']);
        $table->string('title');
        $table->text('description')->nullable();

        $table->text('address');
        $table->string('district');
        $table->string('city');

        $table->decimal('latitude', 10, 7)->nullable();
        $table->decimal('longitude', 10, 7)->nullable();

        $table->string('allowed_gender')->nullable();

        $table->integer('total_rooms');
        $table->integer('available_rooms');

        $table->decimal('monthly_rent', 10, 2);
        $table->decimal('key_money', 10, 2)->nullable();

        $table->enum('status', ['ACTIVE', 'FULL', 'INACTIVE'])->default('INACTIVE');
        $table->enum('approval_status', ['PENDING', 'APPROVED', 'REJECTED'])->default('PENDING');

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
