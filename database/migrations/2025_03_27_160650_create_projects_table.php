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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // name of the project
            $table->longText('description')->nullable(); // description of the project
            $table->timestamp('due_date')->nullable(); // due date of the project
            $table->string('status'); // the status of the project
            $table->string('image_path')->nullable(); 
            $table->foreignId('created_by')->constrained('users'); // created by
            $table->foreignId('updated_by')->constrained('users'); // updated by
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
