@extends('layouts.student')

@section('title',"Demande d'acte")
    
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <p class="mb-0">Your business dashboard template</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Composants</a></li>
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
                                <form action=" {{ route('student.demande.store') }}" method="POST" enctype="multipart/form-data">
                                   @csrf 
                                    <div>
                                    <input type="hidden" name="acte_id" value="{{$demande}}">
                                        <h4>INFORMATIONS PERSONNELLES</h4>
                                        <section id="info_perso">
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
                                        <h4>JOINDRE LES PIECES</h4>
                                        <section id="piece">
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
                                            </div>
                                        </section>
                                        <h4>INFORMATIONS SUR LE PAIEMENT</h4>
                                        <section id="paye">
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
                                        <button type="submit" class="btn btn-primary">Soumettre</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
@endsection