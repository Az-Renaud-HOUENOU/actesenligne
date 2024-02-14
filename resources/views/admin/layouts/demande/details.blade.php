@extends('admin.dashboard')

@section('content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Hi, welcome back!</h4>
            <p class="mb-0">Your business dashboard template</p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Demandes</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Détails</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Détails sur la demande</h4>
            </div>
            <div class="card-body">

                <form action="{{ route('demande.details', ['id' => $demande->id]) }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Code de la demande</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="code" id="code" placeholder="" value="{{ $demande->code }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nom  & Prénoms</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nom_prenoms" id="nom_prenoms" placeholder="" value="{{ $demande->nom }}  {{ $demande->prenom }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Matricule</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="matricule" id="matricule" placeholder="" value="{{ $demande->matricule }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Option</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="option" id="option" placeholder="" value="{{ $demande->option }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="email" placeholder="" value="{{ $demande->email }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Telephone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="numero" id="numero" placeholder="" value="{{ $demande->contact }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Année académique</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="annee" id="annee" placeholder="" value="{{ $demande->annee }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Copie de la fiche de préinscription validée de l'année acdémique concernée</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fichepre_valid" id="fichepre_valid" placeholder="" value="{{ $demande->fichepre_valid }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Copie simple de l'acte de naissance</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="acte_nais" id="acte_nais" placeholder="" value="{{ $demande->acte_nais }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Copie simple du Certificat d'Identification Personnelle (CIP)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="cip" id="cip" placeholder="" value="{{ $demande->cip }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Copie de la fiche de pré-inscription validée de la dernière année académique</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fiche_prederniere" id="fiche_prederniere" placeholder="" value="{{ $demande->fiche_prederniere }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Copie du relevé de notes du 1er semestre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="releve_sem1" id="releve_sem1" placeholder="" value="{{ $demande->releve_sem1 }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Copie du relevé de notes du 2è semestre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="releve_sem2" id="releve_sem2" placeholder="" value="{{ $demande->releve_sem2 }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Copie du relevé de notes du 3è semestre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="releve_sem3" id="releve_sem3" placeholder="" value="{{ $demande->releve_sem3 }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Copie du relevé de notes du 4è semestre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="releve_sem4" id="releve_sem4" placeholder="" value="{{ $demande->releve_sem4 }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Copie du relevé de notes du 5è semestre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="releve_sem5" id="releve_sem5" placeholder="" value="{{ $demande->releve_sem5 }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Copie du relevé de notes du 6è semestre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="releve_sem6" id="releve_sem6" placeholder="" value="{{ $demande->releve_sem6 }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Original du quitus de dépôt du mémoire corrigé après la soutenance</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="quit_memo" id="quit_memo" placeholder="" value="{{ $demande->quit_memo }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Copie de l'attestation de diplôme</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="copie_attes" id="copie_attes" placeholder="" value="{{ $demande->copie_attes }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Copie du diplôme</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="copie_dipl" id="copie_dipl" placeholder="" value="{{ $demande->copie_dipl }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Demande adressée au Directeur de l'IFRI</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="demande_diro" id="demande_diro" placeholder="" value="{{ $demande->demande_diro }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Copie de l'acte ou des actes à certifier</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="copie_act" id="copie_act" placeholder="" value="{{ $demande->copie_act }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Numéro de paiement</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="pay_num" id="pay_num" placeholder="" value="{{ $demande->pay_num }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Preuve de paiement (Quittance)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="preuve" id="preuve" placeholder="" value="{{ $demande->preuve }}" readonly>
                        </div>
                    </div>
                </form>

                <div class="row">
                    <a style="padding:10px; background-color: #015291 ! important;" class="col-lg-5" href="{{route('demande.validate',['id'=>$demande->id])}}" onclick="event.preventDefault(); document.getElementById('valider-form-{{ $demande->id }}').submit();">
                        <h6 style="color: #fff ! important; font-weight:bold">Valider</h6>
                    </a>
                    <p class="col-lg-1"></p>
                    <a style="padding:10px; background-color: #f7b200 ! important;" class="col-lg-5 popup" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <h6 style="font-weight:bold">Rejeter</h6>
                    </a>

                    <form id="valider-form-{{ $demande->id }}" action="{{route('demande.reject',['id'=>$demande->id])}}" method="POST" style="display: none;">
                        @csrf
                        @method('put')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection