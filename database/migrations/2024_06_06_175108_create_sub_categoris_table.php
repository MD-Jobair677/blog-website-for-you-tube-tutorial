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
        Schema::create('sub_categoris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categorie_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('subcategory')->nullable();
            $table->string('slug')->uniqid();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categoris');
    }
};
