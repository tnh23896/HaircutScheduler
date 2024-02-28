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
        Schema::create('work_schedule_details', function (Blueprint $table) {
            $table->id();
            $table->string('time_id');
            $table->string('work_schedules_id');
            $table->enum('status',['available','unavailable'])->default('available');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_schedule_details');
    }
};
