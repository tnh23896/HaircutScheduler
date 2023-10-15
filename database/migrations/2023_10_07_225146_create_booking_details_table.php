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
        Schema::create('booking_details', function (Blueprint $table) {
            $table->id();
            $table->string('service_id');
            $table->string('name');
            $table->string('price');
            $table->string('booking_id');
            $table->enum('status', ['cancel', 'success'])->default('cancel');
            $table->string('admin_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_details');
    }
};
