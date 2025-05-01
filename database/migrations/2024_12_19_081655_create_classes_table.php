<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
USE Illuminate\Database\Eloquent\Relations\HasMany;
USE Illuminate\Database\Eloquent\Relations\BelongsToMany;;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('libelle')->unique();
            $table->string("slug")->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }

    public function eleves() : HasMany 
    {
     return $this->hasMany(Eleve ::class);
    }

    public function profs(): BelongsToMany{
        return $this->belongsToMany(Prof::class);
    }
};
