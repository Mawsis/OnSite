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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->date("deadline");
            $table->date("end")->nullable();
            $table->date("start");
            $table->enum("status", ["pending", "completed"]);
            $table->enum("validation_type", ["file", "picture", "none"]);
            $table->enum("priority", ["high", "medium", "low"])->default("medium");
            $table->string("location")->nullable();
            $table->string("color");
            $table->timestamps();
            $table->foreignId("project_id");
            $table->string("path")->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
