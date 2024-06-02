<!-- Modal -->
<div class="modal fade bd-details-demande-{{$demande->id}}-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Détails sur la demande {{ $demande->code }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <h3 class="text-center mt-4">GENERAL</h3>
                    <div class="container mt-4">
                        <div class="row" style="font-size: large;">
                            <div class="col-md-4">
                                Date de la demande:
                            </div>
                            <div class="col-md-6">
                                {{ $demande->created_at->format('d/m/Y') }}
                            </div>
                        </div>
                        <div class="row" style="font-size: large;">
                            <div class="col-md-4">
                                Code de la demande:
                            </div>
                            <div class="col-md-6">
                                {{  $demande->code }}
                            </div>
                        </div>
                        <div class="row" style="font-size: large;">
                            <div class="col-md-4">
                                Acte demandé:
                            </div>
                            <div class="col-md-6">
                                {{  $demande->acteAcademique->type_acte }}
                            </div>
                        </div>
                        <div class="row" style="font-size: large;">
                            <div class="col-md-4">
                                Année académique:
                            </div>
                            <div class="col-md-6">
                                {{  $demande->annee }}
                            </div>
                        </div>
                    </div>

                    <h3 class="text-center">INFORMATIONS PERSONNELLES SUR l'ETUDIANT</h3>
                    <div class="container mt-4">
                        <div class="row mt-2">
                            <div class="col-md-4" style="font-size: large;">
                                Matricule:
                            </div>
                            <div class="col-md-6" style="font-size: large;">
                                {{  $demande->etudiant->matricule }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4" style="font-size: large;">
                                Nom:
                            </div>
                            <div class="col-md-6" style="font-size: large;">
                                {{  $demande->etudiant->nom }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4" style="font-size: large;">
                                Prénom(s):
                            </div>
                            <div class="col-md-6" style="font-size: large;">
                                {{  $demande->etudiant->prenom }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4" style="font-size: large;">
                                Option:
                            </div>
                            <div class="col-md-6" style="font-size: large;">
                                {{  $demande->etudiant->option }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4" style="font-size: large;">
                                Adresse Gmail:
                            </div>
                            <div class="col-md-6" style="font-size: large;">
                                {{  $demande->etudiant->email }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4" style="font-size: large;">
                                Contact Téléphonique:
                            </div>
                            <div class="col-md-6" style="font-size: large;">
                                {{  $demande->etudiant->contact }}
                            </div>
                        </div>
                    </div>
                    <h3 class="text-center mt-4">PIECES FOURNIES</h3>
                    <div class="container mt-4">
                        @if ($demande->documentDemande->acte_nais)
                            <div class="row mt-2" style="font-size: large;">
                                <div class="col-12">
                                    <div class="">Acte de naissance:</div>
                                    <embed src="{{ asset('storage/' . $demande->documentDemande->acte_nais) }}" width="700" height="400"
                                        type="application/pdf">
                                </div>
                            </div>
                        @endif
                        @if ($demande->documentDemande->cip)
                            <div class="row mt-2" style="font-size: large;">
                                <div class="col-12">
                                    <div class="">Certificat d'Identification Personnelle (CIP):</div>
                                    <embed src="{{ asset('storage/' . $demande->documentDemande->cip) }}" width="700" height="400"
                                        type="application/pdf">
                                </div>
                            </div>
                        @endif
                        @if ($demande->documentDemande->fichepre_valid)
                            <div class="row mt-2" style="font-size: large;">
                                <div class="col-12">
                                    <div class="">Fiche de pré-inscription validée de l'année académique concernée:</div>
                                    <embed src="{{ asset('storage/' . $demande->documentDemande->fichepre_valid) }}" width="700" height="400"
                                        type="application/pdf">
                                </div>
                            </div>
                        @endif
                        @if ($demande->documentDemande->fiche_prederniere)
                            <div class="row mt-2" style="font-size: large;">
                                <div class="col-12">
                                    <div class="">Fiche de pré-inscription validée de la dernière année académique:</div>
                                    <embed src="{{ asset('storage/' . $demande->documentDemande->fiche_prederniere) }}" width="700" height="400"
                                        type="application/pdf">
                                </div>
                            </div>
                        @endif
                        @if ($demande->documentDemande->releve_sem1)
                            <div class="row mt-2" style="font-size: large;">
                                <div class="col-12">
                                    <div class="">Relevés de notes du semestre 1:</div>
                                    <embed src="{{ asset('storage/' . $demande->documentDemande->releve_sem1) }}" width="700" height="400"
                                        type="application/pdf">
                                </div>
                            </div>
                        @endif
                        @if ($demande->documentDemande->releve_sem2)
                            <div class="row mt-2" style="font-size: large;">
                                <div class="col-12">
                                    <div class="">Relevés de notes du semestre 2:</div>
                                    <embed src="{{ asset('storage/' . $demande->documentDemande->releve_sem2) }}" width="700" height="400"
                                        type="application/pdf">
                                </div>
                            </div>
                        @endif
                        @if ($demande->documentDemande->releve_sem3)
                            <div class="row mt-2" style="font-size: large;">
                                <div class="col-12">
                                    <div class="">Relevés de notes du semestre 3:</div>
                                    <embed src="{{ asset('storage/' . $demande->documentDemande->releve_sem3) }}" width="700" height="400"
                                        type="application/pdf">
                                </div>
                            </div>
                        @endif
                        @if ($demande->documentDemande->releve_sem4)
                            <div class="row mt-2" style="font-size: large;">
                                <div class="col-12">
                                    <div class="">Relevés de notes du semestre 4:</div>
                                    <embed src="{{ asset('storage/' . $demande->documentDemande->releve_sem4) }}" width="700" height="400"
                                        type="application/pdf">
                                </div>
                            </div>
                        @endif
                        @if ($demande->documentDemande->releve_sem5)
                            <div class="row mt-2" style="font-size: large;">
                                <div class="col-12">
                                    <div class="">Relevés de notes du semestre 5:</div>
                                    <embed src="{{ asset('storage/' . $demande->documentDemande->releve_sem5) }}" width="700" height="400"
                                        type="application/pdf">
                                </div>
                            </div>
                        @endif
                        @if ($demande->documentDemande->releve_sem6)
                            <div class="row mt-2" style="font-size: large;">
                                <div class="col-12">
                                    <div class="">Relevés de notes du semestre 6:</div>
                                    <embed src="{{ asset('storage/' . $demande->documentDemande->releve_sem6) }}" width="700" height="400"
                                        type="application/pdf">
                                </div>
                            </div>
                        @endif
                        @if ($demande->documentDemande->quit_memo)
                            <div class="row mt-2" style="font-size: large;">
                                <div class="col-12">
                                    <div class="">Quitus de dépôt de mémoire corrigé après soutenance:</div>
                                    <embed src="{{ asset('storage/' . $demande->documentDemande->quit_memo) }}" width="700" height="400"
                                        type="application/pdf">
                                </div>
                            </div>
                        @endif
                        @if ($demande->documentDemande->copie_attes)
                            <div class="row mt-2" style="font-size: large;">
                                <div class="col-12">
                                    <div class="">Attestation de diplôme:</div>
                                    <embed src="{{ asset('storage/' . $demande->documentDemande->copie_attes) }}" width="700" height="400"
                                        type="application/pdf">
                                </div>
                            </div>
                        @endif
                        @if ($demande->documentDemande->copie_dipl)
                            <div class="row mt-2" style="font-size: large;">
                                <div class="col-12">
                                    <div class="">Diplôme:</div>
                                    <embed src="{{ asset('storage/' . $demande->documentDemande->copie_dipl) }}" width="700" height="400"
                                        type="application/pdf">
                                </div>
                            </div>
                        @endif
                        @if ($demande->documentDemande->copie_act)
                            <div class="row mt-2" style="font-size: large;">
                                <div class="col-12">
                                    <div class="">Acte à certifier:</div>
                                    <embed src="{{ asset('storage/' . $demande->documentDemande->copie_act) }}" width="700" height="400"
                                        type="application/pdf">
                                </div>
                            </div>
                        @endif
                        @if ($demande->documentDemande->demande_diro)
                            <div class="row mt-2" style="font-size: large;">
                                <div class="col-12">
                                    <div class="">Demande adressée au directeur de l'IFRI:</div>
                                    <embed src="{{ asset('storage/' . $demande->documentDemande->demande_diro) }}" width="700" height="400"
                                        type="application/pdf">
                                </div>
                            </div>
                        @endif
                        @if ($demande->documentDemande->cert_perte)
                            <div class="row mt-2" style="font-size: large;">
                                <div class="col-12">
                                    <div class="">Certificat de perte:</div>
                                    <embed src="{{ asset('storage/' . $demande->documentDemande->cert_perte) }}" width="700" height="400"
                                        type="application/pdf">
                                </div>
                            </div>
                        @endif
                    </div>

                    @if ($demande->paiement->montant_paye)
                        <h3 class="text-center mt-4">INFORMATIONS SUR LE PAIEMENT</h3>
                        <div class="container mt-4">
                            <div class="row mt-2" style="font-size: large;">
                                <div class="col-md-4">
                                    Montant payé:
                                </div>
                                <div class="col-md-6">
                                    {{ $demande->paiement->montant_paye }}
                                </div>
                            </div>
                            <div class="row mt-2" style="font-size: large;">
                                <div class="col-md-4">
                                    Numéro de la quittance:
                                </div>
                                <div class="col-md-6">
                                    {{ $demande->paiement->pay_num }}
                                </div>
                            </div>
                            <div class="row mt-2" style="font-size: large;">
                                <div class="col-12">
                                    <div class="">Quittance de paiement des frais pour l'acte:</div>
                                    <embed src="{{ asset('storage/' . $demande->paiement->preuve) }}" width="700" height="400"
                                        type="application/pdf">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                @can('demande-reponse')
                    @if($demande->statut=='En cours de traitement')
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Délivrance de l'acte</h4>
                                    </div>
                                    <div class="card-body">
                                        <form  action=" {{ route('reponses',['demande'=>$demande->id] ) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div>
                                                <section>
                                                    <div class="row">
                                                        <div class="col-lg-12 mb-4">
                                                            <div class="form-group">
                                                                <label for="acte_traite" class="form-label"><strong>Envoyer l'acte à l'étudiant <span style="color:red">*</span></strong></label>
                                                                <input id="acte_traite" type="file" class="form-control  @error('acte_traite') is-invalid  @enderror" name="acte_traite" required placeholder="Soumettre le fichier">
                                                                @error('acte_traite')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-primary btn-block">Envoyer</button>
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
                    @endif
                @endcan
                @can('demande-reject')
                    <div class="row" style="display: none" id="rejeter-form-{{ $demande->id }}">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Rejet d'une demande</h4>
                                </div>
                                <div class="card-body">
                                    <form  action=" {{route('demande.reject',['id'=>$demande->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div>
                                            <section>
                                                <div class="row">
                                                    <div class="col-lg-12 mb-4">
                                                        <div class="form-group">
                                                            <label for="motif_rejet" class="form-label"><strong>Entrer le motif du rejet <span style="color:red">*</span></strong></label>
                                                            <input id="motif_rejet" type="text" class="form-control  @error('motif_rejet') is-invalid  @enderror" name="motif_rejet" required placeholder="motif du rejet de la demande">
                                                            @error('motif_rejet')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-danger mr-2">Rejeter</button>
                                                            <button class="btn btn-primary" style="background-color:hsl(206, 100%, 41.2%);" onclick="event.preventDefault(); document.getElementById('rejeter-form-{{ $demande->id }}').style.display='none'; document.getElementById('boutonValidation').style.display='block';">Annuler</button>
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
                @endcan
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    @if($demande->statut=='En attente')
                        @can('demande-validate')
                            <a id="boutonValidation" style="padding:auto; background-color: #45B37E; border:none;" type="button" class="btn btn-primary pull-left mr-2" href="{{route('demande.validate',['id'=>$demande->id])}}" onclick="event.preventDefault(); document.getElementById('valider-form-{{ $demande->id }}').submit();">
                                <h6 style="color: #fff ! important; font-weight:bold">Valider</h6>
                            </a>
                        @endcan
                        @can('demande-reject')
                            <a id="boutonRejet" style="padding:auto; background-color: #FFA446 ; border:none;" type="button" class="btn btn-primary pull-right" href="#" onclick="event.preventDefault(); document.getElementById('rejeter-form-{{ $demande->id }}').style.display='block'; document.getElementById('boutonValidation').style.display='none';">
                                <h6 style="font-weight:bold">Rejeter</h6>
                            </a>
                        @endcan
                    @endif

                    <form id="valider-form-{{ $demande->id }}" action="{{route('demande.validate',['id'=>$demande->id])}}" method="POST" style="display: none;">
                        @csrf
                        @method('put')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-body .row {
        margin-bottom: 20px; /* Ajoute de l'espace entre les lignes */
    }

    .modal-body .col-lg-6 {
        height: 100%; /* Assurez-vous que les deux colonnes ont la même hauteur */
    }

    .modal-body .list-unstyled li {
        margin-bottom: 10px; /* Ajoute de l'espace entre les éléments de la liste */
        word-wrap: break-word; /* Permet aux mots longs de se rompre et de s'ajuster sur plusieurs lignes */
    }
</style>
