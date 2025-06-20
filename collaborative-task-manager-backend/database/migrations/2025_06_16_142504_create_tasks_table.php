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
        $table->id(); // A unique number for each task
        $table->string('title'); // The title of the task
        $table->text('description')->nullable(); // A description (it's optional)
        $table->foreignId('project_id')->constrained()->onDelete('cascade'); // A link to the project it belongs to
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // A link to the user it's assigned to
        $table->timestamps(); // The creation and update times
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
