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
            <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Demandes</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Liste des demandes</h4>

                <div class="d-flex text-end">
                                <form>
                                    <div class="form-group">
                                        <label>Afficher</label>
                                        <select class="form-control" id="sel1">
                                            <option value="toutes" selected>Toutes les demandes</option>
                                            <option value="En attente">Demandes en attente</option>
                                            <option value="En cours de traitement">Demandes en cours de traitement</option>
                                            <option value="Traitée">Demandes traitées</option>
                                            <option value="Rejetée">Demandes rejetées</option>
                                        </select>
                                    </div>
                                </form>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code de la demande</th>
                                <th>Matricule de l'étudiant</th>
                                <th>Acte demandé</th>
                                <th>Statut de la demande</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($demandes as $demande)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$demande->code}}</td>
                                    <td>{{$demande->etudiant->matricule}}</td>
                                    <td>{{$demande->acteAcademique->type_acte}}</td>
                                    <td>
                                        @if($demande->statut=='Traitée')
                                            <span class="badge badge-success">{{$demande->statut}}</span>
                                        @elseif($demande->statut=='En cours de traitement')
                                            <span class="badge badge-warning">{{$demande->statut}}</span>
                                        @elseif($demande->statut=='Rejetée')
                                            <span class="badge badge-danger">{{$demande->statut}}</span>
                                        @else
                                            <span>{{$demande->statut}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-details-demande-{{$demande->id}}-lg">
                                            <a title="Voir" class="btn btn-info" href="#">
                                                <i class="fa-solid fa-eye" style="color: #015291"></i>
                                            </a>
                                        </button>
                                        @include('admin.layouts.demande.details',["demande"=>$demande])
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Code de la demande</th>
                                <th>Matricule de l'étudiant</th>
                                <th>Acte demandé</th>
                                <th>Statut de la demande</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var selectElement = document.getElementById('sel1');
        var tableRows = document.querySelectorAll('#example tbody tr');

        selectElement.addEventListener('change', function () {
            var selectedValue = selectElement.value;

            tableRows.forEach(function (row) {
                var statutCell = row.querySelector('td:nth-child(5)');
                var statut = statutCell.textContent.trim(); // Retirez les espaces blancs des deux côtés

                if (selectedValue === 'toutes' || statut === selectedValue) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection