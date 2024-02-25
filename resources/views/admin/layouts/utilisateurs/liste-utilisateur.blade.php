@extends('admin.dashboard')

@section('title', 'Liste utilisateurs')

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

                                <div class="d-flex text-end">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal-create-user-etudiant">Ajouter un étudiant</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tableEtudiant" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Matricule</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Option</th>
                                                <th>Email</th>
                                                <th>Téléphone</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($etudiants as $etudiant)
                                            <tr>
                                              <td>{{$loop->iteration}}</td>
                                              <td>{{$etudiant->matricule}}</td>
                                              <td>{{$etudiant->nom}}</td>
                                              <td>{{$etudiant->prenom}}</td>
                                              <td>{{$etudiant->option}}</td>
                                              <td>{{$etudiant->email}}</td>
                                              <td>{{$etudiant->contact}}</td>
                                              <td>
                                                <span>
                                                    <a title="Modifier" data-toggle="modal" data-target="#basicModal-edit-user-etudiant-{{$etudiant->id}}">         
                                                        <svg xmlns="http://www.w3.org/2000/svg"  width="16" height="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                                                    </a>
                                                </span>
                                                @include('admin.layouts.utilisateurs.edit-etudiant',["etudiant"=>$etudiant])

                                                <form action="{{ route('utilisateur.supetudiant', $etudiant->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button title="Supprimer" type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">
                                                        <span><i class="fa-regular fa-trash-can"></i></span>
                                                    </button>
                                                </form>
                                              </td>
                                            </tr>
                                          @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Matricule</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Option</th>
                                                <th>Email</th>
                                                <th>Téléphone</th>
                                                <th>Actions</th>
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

                                <div class="d-flex text-end">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal-create-user-admin">Ajouter un administrateur</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tableAdmin" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                              <th>ID</th>
                                              <th>Nom</th>
                                              <th>Fonction</th>
                                              <th>Email</th>
                                              <th>Téléphone</th>
                                              <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($administrateurs as $administrateur)
                                            <tr>
                                              <td>{{$administrateur->id}}</td>
                                              <td>{{$administrateur->name}}</td>
                                              <td>{{$administrateur->fonction}}</td>
                                              <td>{{$administrateur->email}}</td>
                                              <td>{{$administrateur->contact}}</td>
                                              <td>
                                                <span>
                                                    <a title="Modifier" class="btn btn-warning" data-toggle="modal" data-target="#basicModal-edit-user-admin-{{$administrateur->id}}">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </a>
                                                </span>
                                                @include('admin.layouts.utilisateurs.edit-admin',["admin"=>$administrateur])

                                                <form action="{{ route('utilisateur.supadmin', $administrateur->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button title="Supprimer" type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet administrateur ?')">
                                                        <span><i class="fa-regular fa-trash-can"></i></span>
                                                    </button>
                                                </form>
                                              </td>
                                            </tr>
                                          @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>ID</th>
                                              <th>Nom</th>
                                              <th>Fonction</th>
                                              <th>Email</th>
                                              <th>Téléphone</th>
                                              <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                  </div>
</div>

@include('admin.layouts.utilisateurs.create-admin')
@include('admin.layouts.utilisateurs.create-etudiant')

@endsection