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
            $table->foreignId('project_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'in-progress', 'completed','blocked'])->default('pending');
            $table->enum('priority', ['low', 'medium', 'high','urgent'])->default('medium');
            $table->unsignedInteger('estimate')->nullable();
            $table->foreignId('assignee_id')->nullable()->constrained('users')->nullOnDelete()->onUpdate('cascade');
            $table->datetime('reminder')->nullable();
            $table->date('due_date')->nullable();
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
