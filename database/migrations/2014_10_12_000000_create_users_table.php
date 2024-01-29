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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
          $table->string('name')->nullable(); //last name
          $table->string('firstname')->nullable();
          $table->string('title')->nullable();
          $table->string('username')->unique(); 
          $table->string('position')->nullable(); 
          $table->string('description')->nullable(); 
          $table->string('department')->nullable(); 
          $table->string('office')->nullable(); 
          $table->string('info')->nullable(); 
          $table->string('postalcode')->nullable(); 
          $table->string('state')->nullable(); 
          $table->string('street')->nullable(); 
          $table->string('location')->nullable(); 
          $table->string('tel')->nullable(); 
          $table->string('fax')->nullable(); 
          $table->string('telephone_private')->nullable(); 
          $table->string('mobile')->nullable(); 
          $table->string('email_privat')->nullable();
          $table->string('email')->unique();
          $table->string('guid')->unique()->nullable();
          $table->string('domain')->nullable();
          $table->string('password');
          $table->rememberToken();
          $table->timestamps();
          $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
