@extends('layouts.student')

@section('title',"Demande d'acte")

@section('content')
<div class="content-body">
    <!-- row -->
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
        <p>Veuillez remplir en suivant rigourusement les regles donnees, le formulaire suivant pour votre demande.<br> Champ obligatoire <span style="color:red">*</span></p>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">@yield('title')</h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="step1-tab" data-toggle="tab" href="#step1" role="tab" aria-controls="step1" aria-selected="true">INFORMATIONS PERSONNELLES</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="step2-tab" data-toggle="tab" href="#step2" role="tab" aria-controls="step2" aria-selected="false">JOINDRE LES PIECES</a>
                                    </li>
                                    @if ($nomacte != "Attestation de main levée")
                                        <li class="nav-item">
                                            <a class="nav-link" id="step3-tab" data-toggle="tab" href="#step3" role="tab" aria-controls="step3" aria-selected="false">INFORMATIONS SUR LE PAIEMENT</a>
                                        </li>
                                    @endif
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="step1-tab">
                                        <form action="#" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="acte_id" value="{{$demande}}">
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
                                                                @for ($i = 0; $i < $nombre_annees; $i++)
                                                                    @php
                                                                        $annee_debut = $annee_actuelle - $i;
                                                                        $annee_fin = $annee_actuelle - $i + 1;
                                                                    @endphp
                                                                    <option>{{ $annee_debut }} - {{ $annee_fin }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <button class="btn btn-primary" type="button" data-toggle="tab" href="#step2">Suivant</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2-tab">
                                        <form action="{{ route('student.demande.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <section>
                                                <div class="row">
                                                    <div class="col-lg-12 mb-4">
                                                        <div class="form-group">
                                                            <label class="text-label">Copie simple de l'acte de naissance <span style="color:red">*</span></label>
                                                            <input type="file" name="acte_nais" class="form-control  @error('acte_nais') is-invalid  @enderror" placeholder="acte de naissance" >
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
                                                            <input type="file" name="cip" class="form-control  @error('cip') is-invalid  @enderror" placeholder="Votre CIP" >
                                                            @error('cip')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    @if ($nomacte=="Attestation d'inscription ou Certificat de scolarité")
                                                        <div class="col-lg-12 mb-4">
                                                            <div class="form-group">
                                                                <label class="text-label">Copie de la fiche de préinscription validée de l'année acdémique concernée <span style="color:red">*</span></label>
                                                                <input type="file" name="fichepre_valid" class="form-control   @error('fichepre_valid') is-invalid  @enderror" placeholder="Votre Copie de la fiche de préinscription validée" >
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
                                                                <input type="file" name="fichepre_valid" class="form-control   @error('fichepre_valid') is-invalid  @enderror" placeholder="Votre Copie de la fiche de préinscription validée" >
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
                                                                <input type="file" name="fiche_prederniere" class="form-control  @error('fiche_prederniere') is-invalid  @enderror" placeholder="Votre fiche de pré-inscription validée de la dernière année académique" >
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
                                                                <input type="file" name="releve_sem1" class="form-control  @error('releve_sem1') is-invalid  @enderror" placeholder="Votre relevé de notes du 1er semestre" >
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
                                                                <input type="file" name="fiche_prederniere" class="form-control  @error('fiche_prederniere') is-invalid  @enderror" placeholder="Votre fiche de pré-inscription validée de la dernière année académique" >
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
                                                                <input type="file" name="releve_sem1" class="form-control  @error('releve_sem1') is-invalid  @enderror" placeholder="Votre relevé de notes du 1er semestre" >
                                                                @error('releve_sem1')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($nomacte==="Attestation de Diplôme et Diplôme Licence")
                                                        <div class="col-lg-12 mb-4">
                                                            <div class="form-group">
                                                                <label class="text-label">Copie de la fiche de pré-inscription validée de la dernière année académique <span style="color:red">*</span></label>
                                                                <input type="file" name="fiche_prederniere" class="form-control  @error('fiche_prederniere') is-invalid  @enderror" placeholder="Votre fiche de pré-inscription validée de la dernière année académique" >
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
                                                                <input type="file" name="releve_sem1" class="form-control  @error('releve_sem1') is-invalid  @enderror" placeholder="Votre relevé de notes du 1er semestre" >
                                                                @error('releve_sem1')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 mb-4">
                                                            <div class="form-group">
                                                                <label class="text-label">Copie du relevé de notes du 2è semestre <span style="color:red">*</span></label>
                                                                <input type="file" name="releve_sem2" class="form-control  @error('releve_sem2') is-invalid  @enderror" placeholder="Votre relevé de notes du 2è semestre" >
                                                                @error('releve_sem2')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 mb-4">
                                                            <div class="form-group">
                                                                <label class="text-label">Copie du relevé de notes du 3è semestre <span style="color:red">*</span></label>
                                                                <input type="file" name="releve_sem3" class="form-control  @error('releve_sem3') is-invalid  @enderror" placeholder="Votre relevé de notes du 3è semestre" >
                                                                @error('releve_sem3')
                                                                   <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 mb-4">
                                                            <div class="form-group">
                                                                <label class="text-label">Copie du relevé de notes du 4è semestre <span style="color:red">*</span></label>
                                                                <input type="file" name="releve_sem4" class="form-control  @error('releve_sem4') is-invalid  @enderror" placeholder="Votre relevé de notes du 4è semestre" >
                                                                @error('releve_sem4')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 mb-4">
                                                            <div class="form-group">
                                                                <label class="text-label">Copie du relevé de notes du 5è semestre <span style="color:red">*</span></label>
                                                                <input type="file" name="releve_sem5" class="form-control  @error('releve_sem5') is-invalid  @enderror" placeholder="Votre relevé de notes du 5è semestre" >
                                                                @error('releve_sem5')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 mb-4">
                                                            <div class="form-group">
                                                                <label class="text-label">Copie du relevé de notes du 6è semestre <span style="color:red">*</span></label>
                                                                <input type="file" name="releve_sem6" class="form-control  @error('releve_sem6') is-invalid  @enderror" placeholder="Votre relevé de notes du 6è semestre" >
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
                                                                <input type="file" name="quit_memo" class="form-control  @error('quit_memo') is-invalid  @enderror" placeholder="Votre Quitus de dépôt du mémoire corrigé après la soutenance" >
                                                                @error('quit_memo')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($nomacte==="Attestation de Diplôme et Diplôme Master")
                                                        <div class="col-lg-12 mb-4">
                                                            <div class="form-group">
                                                                <label class="text-label">Copie de la fiche de pré-inscription validée de la dernière année académique <span style="color:red">*</span></label>
                                                                <input type="file" name="fiche_prederniere" class="form-control  @error('fiche_prederniere') is-invalid  @enderror" placeholder="Votre fiche de pré-inscription validée de la dernière année académique" >
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
                                                                <input type="file" name="releve_sem1" class="form-control  @error('releve_sem1') is-invalid  @enderror" placeholder="Votre relevé de notes du 1er semestre" >
                                                                @error('releve_sem1')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                                <div class="col-lg-12 mb-4">
                                                                    <div class="form-group">
                                                                        <label class="text-label">Copie du relevé de notes du 2è semestre <span style="color:red">*</span></label>
                                                                        <input type="file" name="releve_sem2" class="form-control  @error('releve_sem2') is-invalid  @enderror" placeholder="Votre relevé de notes du 2è semestre" >
                                                                        @error('releve_sem2')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mb-4">
                                                                    <div class="form-group">
                                                                        <label class="text-label">Copie du relevé de notes du 3è semestre <span style="color:red">*</span></label>
                                                                        <input type="file" name="releve_sem3" class="form-control  @error('releve_sem3') is-invalid  @enderror" placeholder="Votre relevé de notes du 3è semestre" >
                                                                        @error('releve_sem3')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mb-4">
                                                                    <div class="form-group">
                                                                        <label class="text-label">Copie du relevé de notes du 4è semestre <span style="color:red">*</span></label>
                                                                        <input type="file" name="releve_sem4" class="form-control  @error('releve_sem4') is-invalid  @enderror" placeholder="Votre relevé de notes du 4è semestre" >
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
                                                                        <input type="file" name="quit_memo" class="form-control  @error('quit_memo') is-invalid  @enderror" placeholder="Votre Quitus de dépôt du mémoire corrigé après la soutenance" >
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
                                                                <input type="file" name="copie_attes" class="form-control  @error('copie_attes') is-invalid  @enderror" placeholder="Votre attestation de diplôme" >
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
                                                                <input type="file" name="copie_dipl" class="form-control  @error('copie_dipl') is-invalid  @enderror" placeholder="Votre diplôme" >
                                                                @error('copie_dipl')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 mb-4">
                                                            <div class="form-group">
                                                                <label class="text-label">Copie du relevé de notes du 1er semestre <span style="color:red">*</span></label>
                                                                <input type="file" name="releve_sem1" class="form-control  @error('releve_sem1') is-invalid  @enderror" placeholder="Votre relevé de notes du 1er semestre" >
                                                                @error('releve_sem1')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 mb-4">
                                                            <div class="form-group">
                                                                <label class="text-label">Copie du relevé de notes du 2è semestre <span style="color:red">*</span></label>
                                                                <input type="file" name="releve_sem2" class="form-control  @error('releve_sem2') is-invalid  @enderror" placeholder="Votre relevé de notes du 2è semestre" >
                                                                @error('releve_sem2')
                                                                    <div class="invalid-feedback">
                                                                       {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 mb-4">
                                                            <div class="form-group">
                                                                <label class="text-label">Copie du relevé de notes du 3è semestre <span style="color:red">*</span></label>
                                                                <input type="file" name="releve_sem3" class="form-control  @error('releve_sem3') is-invalid  @enderror" placeholder="Votre relevé de notes du 3è semestre" >
                                                                @error('releve_sem3')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 mb-4">
                                                            <div class="form-group">
                                                                <label class="text-label">Copie du relevé de notes du 4è semestre <span style="color:red">*</span></label>
                                                                <input type="file" name="releve_sem4" class="form-control  @error('releve_sem4') is-invalid  @enderror" placeholder="Votre relevé de notes du 4è semestre" >
                                                                @error('releve_sem4')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 mb-4">
                                                            <div class="form-group">
                                                                <label class="text-label">Copie du relevé de notes du 5è semestre <span style="color:red">*</span></label>
                                                                <input type="file" name="releve_sem5" class="form-control  @error('releve_sem5') is-invalid  @enderror" placeholder="Votre relevé de notes du 5è semestre" >
                                                                @error('releve_sem5')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 mb-4">
                                                            <div class="form-group">
                                                                <label class="text-label">Copie du relevé de notes du 6è semestre <span style="color:red">*</span></label>
                                                                <input type="file" name="releve_sem6" class="form-control  @error('releve_sem6') is-invalid  @enderror" placeholder="Votre relevé de notes du 6è semestre" >
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
                                                                <input type="file" name="copie_attes" class="form-control  @error('copie_attes') is-invalid  @enderror" placeholder="Votre attestation de diplôme" >
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
                                                                <input type="file" name="copie_dipl" class="form-control  @error('copie_dipl') is-invalid  @enderror" placeholder="Votre diplôme" >
                                                                @error('copie_dipl')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 mb-4">
                                                            <div class="form-group">
                                                                <label class="text-label">Copie du relevé de notes du 1er semestre <span style="color:red">*</span></label>
                                                                <input type="file" name="releve_sem1" class="form-control  @error('releve_sem1') is-invalid  @enderror" placeholder="Votre relevé de notes du 1er semestre" >
                                                                @error('releve_sem1')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 mb-4">
                                                            <div class="form-group">
                                                                <label class="text-label">Copie du relevé de notes du 2è semestre <span style="color:red">*</span></label>
                                                                <input type="file" name="releve_sem2" class="form-control  @error('releve_sem2') is-invalid  @enderror" placeholder="Votre relevé de notes du 2è semestre" >
                                                                @error('releve_sem2')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 mb-4">
                                                            <div class="form-group">
                                                                <label class="text-label">Copie du relevé de notes du 3è semestre <span style="color:red">*</span></label>
                                                                <input type="file" name="releve_sem3" class="form-control  @error('releve_sem3') is-invalid  @enderror" placeholder="Votre relevé de notes du 3è semestre" >
                                                                @error('releve_sem3')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 mb-4">
                                                            <div class="form-group">
                                                                <label class="text-label">Copie du relevé de notes du 4è semestre <span style="color:red">*</span></label>
                                                                <input type="file" name="releve_sem4" class="form-control  @error('releve_sem4') is-invalid  @enderror" placeholder="Votre relevé de notes du 4è semestre" >
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
                                                                <input type="file" name="demande_diro" class="form-control  @error('demande_diro') is-invalid  @enderror" placeholder="Une demande adressée au directeur de l'IFRI" >
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
                                                                <input type="file" name="copie_act" class="form-control   @error('copie_act') is-invalid  @enderror " placeholder="L'acte ou les actes à certifier" multiple>
                                                                @error('copie_act')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($nomacte==="Duplicata de diplome Licence")
                                                        <div class="col-lg-12 mb-4">
                                                            <div class="form-group">
                                                                <label class="text-label">Demande adressée au Directeur de l'IFRI <span style="color:red">*</span></label>
                                                                <input type="file" name="demande_diro" class="form-control  @error('demande_diro') is-invalid  @enderror" placeholder="Une demande adressée au directeur de l'IFRI" >
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
                                                                        <input type="file" name="cert_perte" class="form-control  @error('cert_perte') is-invalid  @enderror" placeholder="Le certificat de perte" >
                                                                @error('cert_perte')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($nomacte==="Duplicata de diplome Master")
                                                        <div class="col-lg-12 mb-4">
                                                            <div class="form-group">
                                                                <label class="text-label">Demande adressée au Directeur de l'IFRI <span style="color:red">*</span></label>
                                                                <input type="file" name="demande_diro" class="form-control  @error('demande_diro') is-invalid  @enderror" placeholder="Une demande adressée au directeur de l'IFRI" >
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
                                                                <input type="file" name="cert_perte" class="form-control  @error('cert_perte') is-invalid  @enderror" placeholder="Le certificat de perte" >
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
                                                                <input type="file" name="fichepre_valid" class="form-control   @error('fichepre_valid') is-invalid  @enderror" placeholder="Votre Copie de la fiche de préinscription validée" >
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
                                                                <input type="file" name="demande_diro" class="form-control  @error('demande_diro') is-invalid  @enderror" placeholder="Une demande adressée au directeur de l'IFRI" >
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
                                                                <input type="file" name="fiche_prederniere" class="form-control  @error('fiche_prederniere') is-invalid  @enderror" placeholder="Votre fiche de pré-inscription validée de la dernière année académique" >
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
                                            <button class="btn btn-primary" type="button" data-toggle="tab" href="#step1">Précédant</button>
                                            @if ($nomacte==="Attestation de main levée")
                                                <button class="btn btn-primary" type="submit">Soumettre</button>
                                            @else
                                                <button class="btn btn-primary" type="button" data-toggle="tab" href="#step3">Suivant</button>
                                            @endif
                                        </form>
                                    </div>
                                    @if ($nomacte != "Attestation de main levée")
                                        <div class="tab-pane fade" id="step3" role="tabpanel" aria-labelledby="step3-tab">
                                            <form action="{{ route('student.demande.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <section>
                                                    <div class="row">
                                                        <div class="col-lg-6 mb-4">
                                                            <div class="form-group">
                                                                <label class="text-label">Numéro de paiement <span style="color:red">*</span></label>
                                                                <input type="number" name="pay_num" class="form-control  @error('pay_num') is-invalid  @enderror" placeholder="Numéro de la quittance de paiement" >
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
                                                                <input type="number" name="montant_paye" class="form-control  @error('montant_paye') is-invalid  @enderror" placeholder="Le montant payé pour la demande de l'acte" >
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
                                                                <input type="file" name="preuve" class="form-control @error('preuve') is-invalid  @enderror" placeholder="Numero de paiements" >
                                                                @error('preuve')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                                <button class="btn btn-primary" type="button" data-toggle="tab" href="#step2">Précédant</button>
                                                <button class="btn btn-primary" type="submit">Soumettre</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
@endsection
