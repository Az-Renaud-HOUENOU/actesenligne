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
            $table->string('type_acte');
            $table->string('nom');
            $table->string('prenom')->nullable();
            $table->integer('matricule');
            $table->string('option');
            $table->date('fichepre_valid');
            $table->string('acte_nais');
            $table->string('cip');
            $table->integer('fiche_prederniere');
            $table->integer('releve_sem1');
            $table->string('releve_sem2');
            $table->string('releve_sem3');
            $table->string('releve_sem4');
            $table->string('releve_sem5');
            $table->string('releve_sem6');
            $table->string('quit_memo');
            $table->string('copie_attes');
            $table->string('copie_dipl');
            $table->string('copie_act');
            $table->string('demande_diro');
            $table->string('pay_num');
            $table->string('preuve');
            $table->string('statut')->default('En attente');
            $table->unsignedBigInteger('etudiant_id')->nullable();
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
