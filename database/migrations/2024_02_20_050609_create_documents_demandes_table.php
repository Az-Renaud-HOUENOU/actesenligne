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
        Schema::create('documents_demandes', function (Blueprint $table) {
            $table->id();
            $table->string('fichepre_valid')->nullable();
            $table->string('acte_nais')->nullable();
            $table->string('cip')->nullable();
            $table->string('fiche_prederniere')->nullable();
            $table->string('releve_sem1')->nullable();
            $table->string('releve_sem2')->nullable();
            $table->string('releve_sem3')->nullable();
            $table->string('releve_sem4')->nullable();
            $table->string('releve_sem5')->nullable();
            $table->string('releve_sem6')->nullable();
            $table->string('quit_memo')->nullable();
            $table->string('copie_attes')->nullable();
            $table->string('copie_dipl')->nullable();
            $table->string('copie_act')->nullable();
            $table->string('demande_diro')->nullable();
            $table->string('cert_perte')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents_demandes');
    }
};
