<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('SclData', function (Blueprint $table) {
            $table->id();
            $table->string('school');
            $table->string('address');
            $table->string('type');
            $table->string('facility');
            $table->string('feedback');
            $table->timestamps();
        });
    }
  
    public function down(): void
    {
        Schema::dropIfExists('SclData');
    }
};
