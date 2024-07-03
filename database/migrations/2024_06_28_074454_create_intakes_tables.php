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
        Schema::create('intakes_tables', function (Blueprint $table) {
            $table->id();
            $table->string('name', length:20);
            $table->string('month', length:20);
            $table->integer('year')->nullable();
            $table->string('description');
            $table->integer('sort');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intakes_tables');
    }
};
