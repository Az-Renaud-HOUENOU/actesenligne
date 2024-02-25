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
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><strong>Code de la demande:<strong> </li>
                            <li><strong>Acte demandé:<strong> </li>
                            <li><strong>Année académique:<strong> </li>
                            <li><strong>Matricule:<strong> </li>
                            <li><strong>Nom:<strong> </li>
                            <li><strong>Prénom(s):<strong> </li>
                            <li><strong>Option:<strong> </li>
                            <li><strong>Adresse Gmail:<strong> </li>
                            <li><strong>Contact Téléphonique:<strong> </li>
                            @if ($demande->documentDemande->acte_nais)
                                <li><strong>Acte de naissance:<strong> </li>
                            @endif
                            @if ($demande->documentDemande->cip)
                                <li><strong>Certificat d'Identification Personnelle (CIP):<strong> </li>
                            @endif
                            @if ($demande->documentDemande->fichepre_valid)
                                <li><strong>Fiche de pré-inscription validée de l'année académique concernée:<strong> </li>
                            @endif
                            @if ($demande->documentDemande->fiche_prederniere)
                                <li><strong>Fiche de pré-inscription validée de la dernière année académique:<strong> </li>
                            @endif
                            @if ($demande->documentDemande->releve_sem1)
                                <li><strong>Relevés de notes du semestre 1:<strong> </li>
                            @endif
                            @if ($demande->documentDemande->releve_sem2)
                                <li><strong>Relevés de notes du semestre 2:<strong> </li>
                            @endif
                            @if ($demande->documentDemande->releve_sem3)
                                <li><strong>Relevés de notes du semestre 3:<strong> </li>
                            @endif
                            @if ($demande->documentDemande->releve_sem4)
                                <li><strong>Relevés de notes du semestre 4:<strong> </li>
                            @endif
                            @if ($demande->documentDemande->releve_sem5)
                                <li><strong>Relevés de notes du semestre 5:<strong> </li>
                            @endif
                            @if ($demande->documentDemande->releve_sem6)
                                <li><strong>Relevés de notes du semestre 6:<strong> </li>
                            @endif
                            @if ($demande->documentDemande->quit_memo)
                                <li><strong>Quitus de dépôt de mémoire corrigé après soutenance:<strong> </li>
                            @endif
                            @if ($demande->documentDemande->copie_attes)
                                <li><strong>Attestation de diplôme:<strong> </li>
                            @endif
                            @if ($demande->documentDemande->copie_dipl)
                                <li><strong>Diplôme:<strong> </li>
                            @endif
                            @if ($demande->documentDemande->copie_act)
                                <li><strong>Acte à certifier:<strong> </li>
                            @endif
                            @if ($demande->documentDemande->demande_diro)
                                <li><strong>Demande adressée au directeur de l'IFRI: </li>
                            @endif
                            @if ($demande->documentDemande->cert_perte)
                                <li><strong>Certificat de perte:<strong> </li>
                            @endif
                            @if ($demande->paiement->montant_paye)
                                <li><strong>Montant payé:<strong> </li>
                            @endif
                            @if ($demande->paiement->pay_num)
                                <li><strong>Numéro de la quittance:<strong> </li>
                            @endif
                            @if ($demande->paiement->preuve)
                                <li><strong>Quittance de paiement des frais pour l'acte:<strong> </li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li>{{  $demande->code }}</li>
                            <li>{{  $demande->acteAcademique->type_acte }}</li>
                            <li>{{  $demande->annee }}</li>
                            <li>{{  $demande->etudiant->matricule }}</li>
                            <li>{{  $demande->etudiant->nom }}</li>
                            <li>{{  $demande->etudiant->prenom }}</li>
                            <li>{{  $demande->etudiant->option }}</li>
                            <li>{{  $demande->etudiant->email }}</li>
                            <li>{{  $demande->etudiant->contact }}</li>
                            @if ($demande->documentDemande->acte_nais)
                                <li><a href="{{ asset('storage/' . $demande->documentDemande->acte_nais) }}" target="_blank">{{ basename($demande->documentDemande->acte_nais) }}</a></li>
                            @endif
                            @if ($demande->documentDemande->cip)
                                <li><a href="{{ asset('storage/documents/' . $demande->documentDemande->cip) }}" target="_blank">{{ basename($demande->documentDemande->cip) }}</a></li>
                            @endif
                            @if ($demande->documentDemande->fichepre_valid)
                                <li><a href="{{ asset('storage/documents/' . $demande->documentDemande->fichepre_valid) }}" target="_blank">{{ basename($demande->documentDemande->fichepre_valid) }}</a></li>
                            @endif
                            @if ($demande->documentDemande->fiche_prederniere)
                                <li><a href="{{ asset('storage/documents/' . $demande->documentDemande->fiche_prederniere) }}" target="_blank">{{ basename($demande->documentDemande->fiche_prederniere) }}</a></li>
                            @endif
                            @if ($demande->documentDemande->releve_sem1)
                                <li><a href="{{ asset('storage/documents/' . $demande->documentDemande->releve_sem1) }}" target="_blank">{{ basename($demande->documentDemande->releve_sem1) }}</a></li>
                            @endif
                            @if ($demande->documentDemande->releve_sem2)
                                <li><a href="{{ asset('storage/documents/' . $demande->documentDemande->releve_sem2) }}" target="_blank">{{ basename($demande->documentDemande->releve_sem2) }}</a></li>
                            @endif
                            @if ($demande->documentDemande->releve_sem3)
                                <li><a href="{{ asset('storage/documents/' . $demande->documentDemande->releve_sem3) }}" target="_blank">{{ basename($demande->documentDemande->releve_sem3) }}</a></li>
                            @endif
                            @if ($demande->documentDemande->releve_sem4)
                                <li><a href="{{ asset('storage/documents/' . $demande->documentDemande->releve_sem4) }}" target="_blank">{{ basename($demande->documentDemande->releve_sem4) }}</a></li>
                            @endif
                            @if ($demande->documentDemande->releve_sem5)
                                <li><a href="{{ asset('storage/documents/' . $demande->documentDemande->releve_sem5) }}" target="_blank">{{ basename($demande->documentDemande->releve_sem5) }}</a></li>
                            @endif
                            @if ($demande->documentDemande->releve_sem6)
                                <li><a href="{{ asset('storage/documents/' . $demande->documentDemande->releve_sem6) }}" target="_blank">{{ basename($demande->documentDemande->releve_sem6) }}</a></li>
                            @endif
                            @if ($demande->documentDemande->quit_memo)
                                <li><a href="{{ asset('storage/documents/' . $demande->quit_memo) }}" target="_blank">{{ basename($demande->quit_memo) }}</a></li>
                            @endif
                            @if ($demande->documentDemande->copie_attes)
                                <li><a href="{{ asset('storage/documents/' . $demande->documentDemande->copie_attes) }}" target="_blank">{{ basename($demande->documentDemande->copie_attes) }}</a></li>
                            @endif
                            @if ($demande->documentDemande->copie_dipl)
                                <li><a href="{{ asset('storage/documents/' . $demande->documentDemande->copie_dipl) }}" target="_blank">{{ basename($demande->documentDemande->copie_dipl) }}</a></li>
                            @endif
                            @if ($demande->documentDemande->copie_act)
                                <li><a href="{{ asset('storage/documents/' . $demande->documentDemande->copie_act) }}" target="_blank">{{ basename($demande->documentDemande->copie_act) }}</a></li>
                            @endif
                            @if ($demande->documentDemande->demande_diro)
                                <li><a href="{{ asset('storage/documents/' . $demande->documentDemande->demande_diro) }}" target="_blank">{{ basename($demande->documentDemande->demande_diro) }}</a></li>
                            @endif
                            @if ($demande->documentDemande->cert_perte)
                                <li><a href="{{ asset('storage/documents/' . $demande->documentDemande->cert_perte) }}" target="_blank">{{ basename($demande->documentDemande->cert_perte) }}</a></li>
                            @endif
                            @if ($demande->paiement->montant_paye)
                                <li>{{ $demande->paiement->montant_paye }}</li>
                            @endif
                            @if ($demande->paiement->pay_num)
                                <li>{{ $demande->paiement->pay_num }}</li>
                            @endif
                            @if ($demande->paiement->preuve)
                                <li><a href="{{ asset('storage/documents/' . $demande->paiement->preuve) }}" target="_blank">{{ basename($demande->paiement->preuve) }}</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <a style="padding:10px; background-color: #015291 ! important;" type="button" class="btn btn-primary" href="{{route('demande.validate',['id'=>$demande->id])}}" onclick="event.preventDefault(); document.getElementById('valider-form-{{ $demande->id }}').submit();">
                        <h6 style="color: #fff ! important; font-weight:bold">Valider</h6>
                    </a>
                    <a style="padding:10px; background-color: #f7b200 ! important;" type="button" class="btn btn-primary" href="{{route('demande.reject',['id'=>$demande->id])}}" onclick="event.preventDefault(); document.getElementById('rejeter-form-{{ $demande->id }}').submit();">
                        <h6 style="font-weight:bold">Rejeter</h6>
                    </a>

                    <form id="valider-form-{{ $demande->id }}" action="{{route('demande.validate',['id'=>$demande->id])}}" method="POST" style="display: none;">
                        @csrf
                        @method('put')
                    </form>
                    <form id="rejeter-form-{{ $demande->id }}" action="{{route('demande.reject',['id'=>$demande->id])}}" method="POST" style="display: none;">
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