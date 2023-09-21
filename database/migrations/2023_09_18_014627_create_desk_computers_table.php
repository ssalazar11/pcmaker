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
        Schema::create('desk_computers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cpu');
            $table->string('ram');
            $table->string('HDD');
            $table->string('graphicCard');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desk_computers');
    }
};
