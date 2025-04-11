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
            $table->string('name'); // name of the task (required)
            $table->longText('description')->nullable(); // description of the task, (not required)
            $table->string('image_path')->nullable(); // task image (not required)
            $table->string('status'); // status of the task
            $table->string('priority'); // priority of the task
            $table->string('due_date')->nullable(); // due date of the task
            $table->foreignId('created_by')->constrained('users'); // created by
            $table->foreignId('updated_by')->constrained('users'); // updated by
            $table->foreignId('assigned_user_id')->constrained('users'); // assigned user id (task assigned to the user)
            $table->foreignId('project_id')->constrained('projects'); // task belongs to what project
            $table->timestamps();
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
