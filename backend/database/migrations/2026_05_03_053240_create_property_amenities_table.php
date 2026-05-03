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
        Schema::create('property_amenities', function (Blueprint $table) {
            $table->id('amenity_id');
            $table->foreignId('property_id')->constrained()->onDelete('cascade');

            $table->boolean('parking')->default(false);
            $table->boolean('kitchen')->default(false);
            $table->boolean('attached_bathroom')->default(false);
            $table->boolean('hot_water')->default(false);
            $table->boolean('wifi')->default(false);
            $table->boolean('security')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_amenities');
    }
};
