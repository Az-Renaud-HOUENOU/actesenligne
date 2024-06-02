@extends('layouts.student')

@section('title',"Demande d'acte")

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bienvenu(e)!</h4>
                    <p class="mb-0">Votre plateforme de demande d'acte académique</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">ActesEnLigne</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Demander un acte</a></li>
                </ol>
            </div>
        </div>
        <p>Veuillez remplir en suivant rigoureusement les règles données, le formulaire suivant pour faire votre demande.<br> Champ obligatoire <span style="color:red">*</span></p>

        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Demande d'acte académique: <strong>{{ $nomacte }}</strong></h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('student.demande.store') }}" method="POST" enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                            @csrf
                            <div>
                                <input type="hidden" name="acte_id" value="{{$demande}}">
                                <h4>INFORMATIONS PERSONNELLES</h4>
                                <section>
                                    <div class="row">
                                        <div class="col-lg-6 mb-4">
                                            <div class="form-group">
                                                <label class="text-label">Nom <span style="color:red">*</span></label>
                                                <input type="text" name="nom" class="form-control  @error('nom') is-invalid  @enderror" placeholder="Votre nom" value="{{$etudiant->nom}}" readonly>
                                                @error('nom')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <div class="form-group">
                                                <label class="text-label">Prénoms <span style="color:red">*</span></label>
                                                <input type="text" name="prenom" class="form-control @error('prenom') is-invalid  @enderror " value="{{$etudiant->prenom}}" readonly placeholder="Votre prénom" >
                                                @error('prenom')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <div class="form-group">
                                                <label class="text-label">Matricule <span style="color:red">*</span></label>
                                                <input type="number" name="matricule" class="form-control  @error('matricule') is-invalid  @enderror" placeholder="Votre matricule" value="{{$etudiant->matricule}}" readonly >
                                                @error('matricule')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <div class="form-group">
                                                <label class="text-label">Option <span style="color:red">*</span></label>
                                                <input type="text" name="option" class="form-control @error('option') is-invalid  @enderror" placeholder="Votre option" value="{{$etudiant->option}}" required readonly>
                                                @error('option')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-4">
                                            <div class="form-group">
                                                <label class="text-label">Email <span style="color:red">*</span></label>
                                                <div class="input-group">
                                                    <input type="email" name="email" class="form-control @error('email') is-invalid  @enderror" placeholder="example@example.com" value="{{$etudiant->email}}" readonly id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2">
                                                </div>
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-4">
                                            <div class="form-group">
                                                <label class="text-label">Telephone <span style="color:red">*</span></label>
                                                <div class="input-group">
                                                    <input type="number" name="numero" class="form-control @error('numero') is-invalid  @enderror" placeholder="Votre numro de téléphone" value="{{$etudiant->contact}}" readonly>
                                                </div>
                                                @error('numero')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-4">
                                            @php
                                                // Année actuelle
                                                $annee_actuelle = date('Y');
                                                // Année de début
                                                $debut_annee = 2013;
                                                // Nombre d'années à générer
                                                $nombre_annees = $annee_actuelle - $debut_annee + 1;
                                            @endphp
                                            <div class="form-group">
                                                <label class="text-label">Année académique <span style="color:red">*</span></label>
                                                <select name="annee_academique" class="form-control" required>
                                                    <option selected>Sélectionner...</option>
                                                    @for ($i = 1; $i < $nombre_annees; $i++)
                                                        @php
                                                            $annee_debut = $annee_actuelle - $i;
                                                            $annee_fin = $annee_debut + 1;
                                                        @endphp
                                                        <option>{{ $annee_debut }} - {{ $annee_fin }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h4>JOINDRE LES PIECES</h4>
                                <section>
                                    <div class="row">
                                        <div class="col-lg-12 mb-4">
                                            <div class="form-group">
                                                <label class="text-label">Copie simple de l'acte de naissance <span style="color:red">*</span></label>
                                                <input type="file" name="acte_nais" class="form-control  @error('acte_nais') is-invalid  @enderror" placeholder="acte de naissance" required>
                                                @error('acte_nais')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-4">
                                            <div class="form-group">
                                                <label class="text-label">Copie simple du Certificat d'Identification Personnelle (CIP) <span style="color:red">*</span></label>
                                                <input type="file" name="cip" class="form-control  @error('cip') is-invalid  @enderror" placeholder="Votre CIP" required>
                                                @error('cip')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        @if ($nomacte=="Attestation d'Inscription ou Certificat de Scolarité")
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie de la fiche de préinscription validée de l'année acdémique concernée <span style="color:red">*</span></label>
                                                    <input type="file" name="fichepre_valid" class="form-control   @error('fichepre_valid') is-invalid  @enderror" placeholder="Votre Copie de la fiche de préinscription validée" required>
                                                    @error('fichepre_valid')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                        @if ($nomacte=="Relevé de notes")
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie de la fiche de préinscription validée de l'année acdémique concernée <span style="color:red">*</span></label>
                                                    <input type="file" name="fichepre_valid" class="form-control   @error('fichepre_valid') is-invalid  @enderror" placeholder="Votre Copie de la fiche de préinscription validée" required>
                                                    @error('fichepre_valid')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                        @if ($nomacte==="Attestation de succès")
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie de la fiche de pré-inscription validée de la dernière année académique <span style="color:red">*</span></label>
                                                    <input type="file" name="fiche_prederniere" class="form-control  @error('fiche_prederniere') is-invalid  @enderror" placeholder="Votre fiche de pré-inscription validée de la dernière année académique" required>
                                                    @error('fiche_prederniere')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 1er semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem1" class="form-control  @error('releve_sem1') is-invalid  @enderror" placeholder="Votre relevé de notes du 1er semestre" required>
                                                    @error('releve_sem1')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                        @if ($nomacte==="Attestation d'admissibilité")
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie de la fiche de pré-inscription validée de la dernière année académique <span style="color:red">*</span></label>
                                                    <input type="file" name="fiche_prederniere" class="form-control  @error('fiche_prederniere') is-invalid  @enderror" placeholder="Votre fiche de pré-inscription validée de la dernière année académique" required>
                                                    @error('fiche_prederniere')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 1er semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem1" class="form-control  @error('releve_sem1') is-invalid  @enderror" placeholder="Votre relevé de notes du 1er semestre" required>
                                                    @error('releve_sem1')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                        @if ($nomacte==="Attestation de diplôme et Diplôme Licence")
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie de la fiche de pré-inscription validée de la dernière année académique <span style="color:red">*</span></label>
                                                    <input type="file" name="fiche_prederniere" class="form-control  @error('fiche_prederniere') is-invalid  @enderror" placeholder="Votre fiche de pré-inscription validée de la dernière année académique" required>
                                                    @error('fiche_prederniere')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 1er semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem1" class="form-control  @error('releve_sem1') is-invalid  @enderror" placeholder="Votre relevé de notes du 1er semestre" required>
                                                    @error('releve_sem1')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 2è semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem2" class="form-control  @error('releve_sem2') is-invalid  @enderror" placeholder="Votre relevé de notes du 2è semestre" required>
                                                    @error('releve_sem2')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 3è semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem3" class="form-control  @error('releve_sem3') is-invalid  @enderror" placeholder="Votre relevé de notes du 3è semestre" required>
                                                    @error('releve_sem3')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 4è semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem4" class="form-control  @error('releve_sem4') is-invalid  @enderror" placeholder="Votre relevé de notes du 4è semestre" required>
                                                    @error('releve_sem4')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 5è semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem5" class="form-control  @error('releve_sem5') is-invalid  @enderror" placeholder="Votre relevé de notes du 5è semestre" required>
                                                    @error('releve_sem5')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 6è semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem6" class="form-control  @error('releve_sem6') is-invalid  @enderror" placeholder="Votre relevé de notes du 6è semestre" required>
                                                    @error('releve_sem6')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label"> Original du quitus de dépôt du mémoire corrigé après la soutenance <span style="color:red">*</span></label>
                                                    <input type="file" name="quit_memo" class="form-control  @error('quit_memo') is-invalid  @enderror" placeholder="Votre Quitus de dépôt du mémoire corrigé après la soutenance" required>
                                                    @error('quit_memo')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                        @if ($nomacte==="Attestation de diplôme et Diplôme Master")
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie de la fiche de pré-inscription validée de la dernière année académique <span style="color:red">*</span></label>
                                                    <input type="file" name="fiche_prederniere" class="form-control  @error('fiche_prederniere') is-invalid  @enderror" placeholder="Votre fiche de pré-inscription validée de la dernière année académique" required>
                                                    @error('fiche_prederniere')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 1er semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem1" class="form-control  @error('releve_sem1') is-invalid  @enderror" placeholder="Votre relevé de notes du 1er semestre" required>
                                                    @error('releve_sem1')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 2è semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem2" class="form-control  @error('releve_sem2') is-invalid  @enderror" placeholder="Votre relevé de notes du 2è semestre" required>
                                                    @error('releve_sem2')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 3è semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem3" class="form-control  @error('releve_sem3') is-invalid  @enderror" placeholder="Votre relevé de notes du 3è semestre" required>
                                                    @error('releve_sem3')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 4è semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem4" class="form-control  @error('releve_sem4') is-invalid  @enderror" placeholder="Votre relevé de notes du 4è semestre" required>
                                                    @error('releve_sem4')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label"> Original du quitus de dépôt du mémoire corrigé après la soutenance <span style="color:red">*</span></label>
                                                    <input type="file" name="quit_memo" class="form-control  @error('quit_memo') is-invalid  @enderror" placeholder="Votre Quitus de dépôt du mémoire corrigé après la soutenance" required>
                                                    @error('quit_memo')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                        @if ($nomacte==="Supplément au diplôme Licence")
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie de l'attestation de diplôme <span style="color:red">*</span></label>
                                                    <input type="file" name="copie_attes" class="form-control  @error('copie_attes') is-invalid  @enderror" placeholder="Votre attestation de diplôme" required>
                                                    @error('copie_attes')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du diplôme <span style="color:red">*</span></label>
                                                    <input type="file" name="copie_dipl" class="form-control  @error('copie_dipl') is-invalid  @enderror" placeholder="Votre diplôme" required>
                                                    @error('copie_dipl')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 1er semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem1" class="form-control  @error('releve_sem1') is-invalid  @enderror" placeholder="Votre relevé de notes du 1er semestre" required>
                                                    @error('releve_sem1')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 2è semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem2" class="form-control  @error('releve_sem2') is-invalid  @enderror" placeholder="Votre relevé de notes du 2è semestre" required>
                                                    @error('releve_sem2')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 3è semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem3" class="form-control  @error('releve_sem3') is-invalid  @enderror" placeholder="Votre relevé de notes du 3è semestre" required>
                                                    @error('releve_sem3')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 4è semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem4" class="form-control  @error('releve_sem4') is-invalid  @enderror" placeholder="Votre relevé de notes du 4è semestre" required>
                                                    @error('releve_sem4')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 5è semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem5" class="form-control  @error('releve_sem5') is-invalid  @enderror" placeholder="Votre relevé de notes du 5è semestre" required>
                                                    @error('releve_sem5')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 6è semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem6" class="form-control  @error('releve_sem6') is-invalid  @enderror" placeholder="Votre relevé de notes du 6è semestre" required>
                                                    @error('releve_sem6')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                        @if ($nomacte==="Supplément au diplôme Master")
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie de l'attestation de diplôme <span style="color:red">*</span></label>
                                                    <input type="file" name="copie_attes" class="form-control  @error('copie_attes') is-invalid  @enderror" placeholder="Votre attestation de diplôme" required>
                                                    @error('copie_attes')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du diplôme <span style="color:red">*</span></label>
                                                    <input type="file" name="copie_dipl" class="form-control  @error('copie_dipl') is-invalid  @enderror" placeholder="Votre diplôme" required>
                                                    @error('copie_dipl')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 1er semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem1" class="form-control  @error('releve_sem1') is-invalid  @enderror" placeholder="Votre relevé de notes du 1er semestre" required>
                                                    @error('releve_sem1')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 2è semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem2" class="form-control  @error('releve_sem2') is-invalid  @enderror" placeholder="Votre relevé de notes du 2è semestre" required>
                                                    @error('releve_sem2')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 3è semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem3" class="form-control  @error('releve_sem3') is-invalid  @enderror" placeholder="Votre relevé de notes du 3è semestre" required>
                                                    @error('releve_sem3')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie du relevé de notes du 4è semestre <span style="color:red">*</span></label>
                                                    <input type="file" name="releve_sem4" class="form-control  @error('releve_sem4') is-invalid  @enderror" placeholder="Votre relevé de notes du 4è semestre" required>
                                                    @error('releve_sem4')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                        @if ($nomacte==="Certification de relevés de notes, de l'attestation de diplôme et du diplôme")
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Demande adressée au Directeur de l'IFRI <span style="color:red">*</span></label>
                                                    <input type="file" name="demande_diro" class="form-control  @error('demande_diro') is-invalid  @enderror" placeholder="Une demande adressée au directeur de l'IFRI" required>
                                                    @error('demande_diro')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label ">Copie de l'acte ou des actes à certifier <span style="color:red">*</span></label>
                                                    <input type="file" name="copie_act" class="form-control   @error('copie_act') is-invalid  @enderror " placeholder="L'acte ou les actes à certifier" multiple required>
                                                    @error('copie_act')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                        @if ($nomacte==="Duplicata de diplôme Licence")
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Demande adressée au Directeur de l'IFRI <span style="color:red">*</span></label>
                                                    <input type="file" name="demande_diro" class="form-control  @error('demande_diro') is-invalid  @enderror" placeholder="Une demande adressée au directeur de l'IFRI" required>
                                                    @error('demande_diro')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie légalisée du Certificat de perte <span style="color:red">*</span></label>
                                                    <input type="file" name="cert_perte" class="form-control  @error('cert_perte') is-invalid  @enderror" placeholder="Le certificat de perte" required>
                                                    @error('cert_perte')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                        @if ($nomacte==="Duplicata de diplôme Master")
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Demande adressée au Directeur de l'IFRI <span style="color:red">*</span></label>
                                                    <input type="file" name="demande_diro" class="form-control  @error('demande_diro') is-invalid  @enderror" placeholder="Une demande adressée au directeur de l'IFRI" required>
                                                    @error('demande_diro')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie légalisée du Certificat de perte <span style="color:red">*</span></label>
                                                    <input type="file" name="cert_perte" class="form-control  @error('cert_perte') is-invalid  @enderror" placeholder="Le certificat de perte" required>
                                                    @error('cert_perte')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                        @if ($nomacte==="Réclamation")
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie de la fiche de préinscription validée de l'année acdémique concernée <span style="color:red">*</span></label>
                                                    <input type="file" name="fichepre_valid" class="form-control   @error('fichepre_valid') is-invalid  @enderror" placeholder="Votre Copie de la fiche de préinscription validée" required>
                                                    @error('fichepre_valid')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                        @if ($nomacte==="Attestation de main levée")
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Demande adressée au Directeur de l'IFRI <span style="color:red">*</span></label>
                                                    <input type="file" name="demande_diro" class="form-control  @error('demande_diro') is-invalid  @enderror" placeholder="Une demande adressée au directeur de l'IFRI" required>
                                                    @error('demande_diro')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Copie de la fiche de pré-inscription validée de la dernière année académique <span style="color:red">*</span></label>
                                                    <input type="file" name="fiche_prederniere" class="form-control  @error('fiche_prederniere') is-invalid  @enderror" placeholder="Votre fiche de pré-inscription validée de la dernière année académique" required>
                                                    @error('fiche_prederniere')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </section>
                                @if ($nomacte != "Attestation de main levée")
                                    <h4>INFORMATIONS SUR LE PAIEMENT</h4>
                                    <section>
                                        <div class="row">
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Numéro de paiement <span style="color:red">*</span></label>
                                                    <input type="number" name="pay_num" class="form-control  @error('pay_num') is-invalid  @enderror" placeholder="Numéro de la quittance de paiement" required>
                                                    @error('pay_num')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Entrer le montant payé <span style="color:red">*</span></label>
                                                    <input type="number" name="montant_paye" class="form-control  @error('montant_paye') is-invalid  @enderror" placeholder="Le montant payé pour la demande de l'acte" required>
                                                    @error('montant_paye')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Preuve de paiement (Quittance) <span style="color:red">*</span></label>
                                                    <input type="file" name="preuve" class="form-control @error('preuve') is-invalid  @enderror" placeholder="Numero de paiements" required>
                                                    @error('preuve')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                @endif
                                <h4></h4>
                                <section>
                                    <div class="row">
                                        <div class="col-xl-12 col-xxl-12">
                                            <div style="text-align: justify">
                                                <h5 class="card-title" style="font-weight: bold; color:black; font-size:1.3rem;">Instructions finales et assistance</h5>
                                                <p>Merci d'avoir rempli le formulaire pour votre demande de {{ $nomacte }} en ligne. Avant de soumettre votre demande, veuillez prendre un moment pour lire les instructions finales suivantes :</p>
                                                <ol style="line-height: 1.8;">
                                                    <li style="margin-bottom:12px;"><span style="font-weight: bold; color:black;">Vérification des informations :</span> Assurez-vous d'avoir correctement rempli toutes les sections du formulaire avec les informations exactes. Cela inclut vos coordonnées personnelles, les pièces jointes requises et les détails de paiement. Des informations précises garantissent un traitement rapide et efficace de votre demande.</li>
                                                    <li style="margin-bottom:12px;"><span style="font-weight: bold; color:black;">Assistance supplémentaire :</span> Si vous avez des questions ou si vous avez besoin d'aide supplémentaire pour remplir ce formulaire, n'hésitez pas à contacter notre équipe d'assistance dédiée. Vous pouvez nous joindre par téléphone au <strong>(+229) 55 02 80 70</strong> ou par mail à <strong><a href="mailto:secretariat@ifri.uac.bj">secretariat@ifri.uac.bj</a></strong>. Nous sommes là pour vous aider et répondre à toutes vos questions.</li>
                                                    <li><span style="font-weight: bold; color:black;">Confirmation de soumission :</span> Après avoir soumis votre demande, vous recevrez un e-mail de confirmation contenant le code d'enregistrement de votre demande, ceci vous permettra de vérifier le statut de votre demande. Veuillez vérifier votre boîte de réception et votre dossier de courriers indésirables pour vous assurer de recevoir notre e-mail. Si vous ne recevez pas de confirmation dans les 24 heures suivant votre soumission, veuillez nous contacter immédiatement.</li>
                                                </ol>
                                                <p>Nous vous remercions de votre confiance en notre service en ligne. Nous nous engageons à fournir une expérience de demande fluide et efficace. Si vous avez des préoccupations ou des commentaires concernant votre expérience, n'hésitez pas à nous les partager. Votre feedback est précieux pour nous aider à améliorer nos services.</p>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
