<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('semesters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('level_id')->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('numero');
            $table->string('libelle', 100);
            $table->unsignedSmallInteger('credits_requis')->default(30);
            $table->timestamps();

            $table->unique(['level_id', 'numero']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('semesters');
    }
};
