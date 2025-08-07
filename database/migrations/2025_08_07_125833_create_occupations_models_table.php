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
        Schema::create('occupations', function (Blueprint $table) {
            $table->id();
            $table->string("title", 64);
            $table->text("description");
            $table->string("location", 32);
            $table->enum("type", ["full-time", "part-time", "internship"]);
            $table->foreignId("department_id")->constrained();
            $table->string("salary")->nullable();
            $table->date("deadline");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('occupations');
    }
};
