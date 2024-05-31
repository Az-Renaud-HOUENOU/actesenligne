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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->unsignedBigInteger('etudiant_id');
            $table->foreign('etudiant_id')->references('id')->on('etudiants')->onDelete('cascade');
            $table->unsignedBigInteger('acte_id');
            $table->foreign('acte_id')->references('id')->on('acte_academiques')->onDelete('cascade');
            $table->string('annee');
            $table->unsignedBigInteger('documents_id');
            $table->foreign('documents_id')->references('id')->on('documents_demandes')->onDelete('cascade');
            $table->unsignedBigInteger('paiement_id')->nullable();
            $table->foreign('paiement_id')->references('id')->on('paiements')->onDelete('cascade');
            $table->string('statut')->default('En attente');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
