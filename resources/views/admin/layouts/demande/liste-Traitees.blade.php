<link type="text/css" href="{{assert('DataTables/DataTables-1.13.8/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<script type="text/javascript" charset="utf8" src="{{assert('DataTables/DataTables-1.13.8/js/jquery.dataTables.min.js')}}"></script>
<script>
  // let table = new DataTable('#myTable');

  $(document).ready( function () {
    $('#demandesTraiteesTable').DataTable();
  } );
</script>

@extends('admin.dashboard')

@section('content')
<div class="container">
    <h2 class="main-title">Liste des demandes traitées</h2>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <table id="demandesTraiteesTable'">
                                <thead>
                                    <tr>
                                    <th>Matricule de l'étudiant</th>
                                    <th>Nom</th>
                                    <th>Acte demandé</th>
                                    <th>Statut de la demande</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($demandesTraitees as $demande)
                                        <tr>
                                            <td>{{$demande->matricule}}</td>
                                            <td>{{$demande->name}}</td>
                                            <td>{{$demande->acte_demande}}</td>
                                            <td>{{$demande->statut}}</td>
                                            <td>
                                                <button class="btn btn-info btn-sm view details" data-id="{{$demande->id}}">Voir</button>
                                                <button class="btn btn-info btn-sm delete-demande" data-id="{{$demande->id}}">Supprimer</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
            </div>
        </section>
</div>
@endsection