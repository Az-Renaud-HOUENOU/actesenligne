@extends('admin.dashboard')

@section('content')
<div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Bienvenu(e) !</h4>
                            <p class="mb-0">Votre plateforme de demande d'acte académique</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">ActesEnLigne</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Tableau de bord administrateur</a></li>
                        </ol>
                    </div>
</div>
                <div class="row">
                    <div class="col mx-2 p-4 shadow p-2" style="background-color:white;">
                        <h3 class="text-center pt-2">Demandes ({{ $all_demandes }})</h3>
                        <div class="widget-timeline mt-4" style="font-size: 18px; justify-content : space-between;">
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-badge success"></div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>Traitées ({{ $d_tr }})</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge info"></div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>En Cours de Traitement ({{ $d_ct }})</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge warning"></div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>En Attente ({{ $d_ea }})</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge danger">
                                    </div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>Rejetées ({{ $d_rj }})</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col p-4 mx-1 shadow p-2" style="background-color: white;">
                        <h3 class="text-center pt-2">Actes Académiques</h3>
                        <p class="text-center mt-4" style="font-size: 18px;">
                            ({{ $all_actes }})
                        </p>
                    </div>
                    <div class="col mx-2 p-4 shadow p-2" style="background-color:white;">
                        <h3 class="text-center pt-2">Utilisateurs ({{ $all_users }})</h3>
                        <div class="mt-4 d-flex" style="font-size: 18px; justify-content : space-between;">
                            <div>Etudiants ({{ $all_etu }})</div>
                            <div>Personnel Administratif ({{ $all_adm }})</div>
                        </div>
                    </div>
                </div>
@endsection
