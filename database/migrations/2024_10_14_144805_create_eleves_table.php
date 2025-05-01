<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model\Relations\BelongsTo;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('image');
            $table->date('dateNaiss');
            $table->string('email');
            $table->timestamps();
            $table->foreignId('classe_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('restrict');
        });
    }

    public function classe():BelongsTo
    {
        return $this->belongsTo(Classe::class);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleves');
    }
};
