@extends('admin.dashboard')

@section('title', 'Liste acte')

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
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Utilisateurs</a></li>
        </ol>
    </div>
</div>

<div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Liste des étudiants</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Matricule</th>
                                                <th>Nom</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($etudiants as $etudiant)
                                            <tr>
                                              <td>{{$etudiant->matricule}}</td>
                                              <td>{{$etudiant->name}}</td>
                                              <td>{{$etudiant->email}}</td>
                                            </tr>
                                          @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Matricule</th>
                                                <th>Nom</th>
                                                <th>Email</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                  </div>

                  <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Liste des administrateurs</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                              <th>ID</th>
                                              <th>Nom</th>
                                              <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($administrateurs as $administrateur)
                                            <tr>
                                              <td>{{$administrateur->id}}</td>
                                              <td>{{$administrateur->name}}</td>
                                              <td>{{$administrateur->email}}</td>
                                            </tr>
                                          @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>ID</th>
                                              <th>Nom</th>
                                              <th>Email</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                  </div>
</div>
@endsection