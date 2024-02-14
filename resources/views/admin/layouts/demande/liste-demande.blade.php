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
                <h4 class="card-title">Liste des actes académiques</h4>

                <div class="d-flex text-end">
                                <form>
                                    <div class="form-group">
                                        <label>Afficher</label>
                                        <select class="form-control" id="sel1">
                                            <option selected>Toutes les demandes</option>
                                            <option>Demandes en attente</option>
                                            <option>Demandes traitées</option>
                                            <option>Demandes rejetées</option>
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
                                    <td>{{$demande->matricule}}</td>
                                    <td>{{$demande->acte_demande}}</td>
                                    <td>
                                        @if($demande->statut=='Traité')
                                            <span class="badge badge-success">{{$demande->statut}}</span>
                                        @elseif($demande->statut=='En cours de traitement')
                                            <span class="badge badge-warning">{{$demande->statut}}</span>
                                        @elseif($demande->statut=='Rejeté')
                                            <span class="badge badge-danger">{{$demande->statut}}</span>
                                        @else
                                            <span>{{$demande->statut}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary">
                                            <a title="Voir" class="btn btn-info" href="{{route('demandes.details', $demande->id) }}">
                                                <i class="bi bi-eye" style="color: #015291"></i>
                                            </a>
                                        </button>

                                        <form action="{{ route('actes.destroy', $acte->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet acte ?')">
                                                <i id ="bttn" class="fa fa-trash" title="Supprimer"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
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
@endsection