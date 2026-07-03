<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained()->cascadeOnDelete();
            $table->foreignId('specialty_id')->nullable()->constrained()->nullOnDelete();
            $table->string('code', 20)->unique();
            $table->string('libelle', 100);
            $table->unsignedTinyInteger('ordre');
            $table->timestamps();

            $table->unique(['program_id', 'specialty_id', 'ordre']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('levels');
    }
};
