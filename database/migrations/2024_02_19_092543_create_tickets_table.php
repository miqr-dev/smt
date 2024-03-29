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
    Schema::create('tickets', function (Blueprint $table) {
      $table->id();
      $table->string('type');
      $table->string('status');
      $table->string('priority');
      $table->boolean('onLocation');
      $table->foreignId('submitter_id');
      $table->foreignId('assignedTo_id');
      $table->foreignId('done_by');
      $table->text('it_notes');
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('tickets');
  }
};
