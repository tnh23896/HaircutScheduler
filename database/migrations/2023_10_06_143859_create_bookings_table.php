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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('admin_id');
            $table->string('phone');
            $table->unsignedBigInteger('promo_id');
            $table->integer('status');
            $table->integer('price');
            $table->string('email');
            $table->date('day');
            $table->unsignedBigInteger('work_schedule_detail_id');
            $table->timestamp('created_at');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
