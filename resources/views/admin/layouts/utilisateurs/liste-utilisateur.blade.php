@extends('admin.dashboard')

@section('title', 'Liste utilisateurs')

@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Bienvenu(e)!</h4>
            <p class="mb-0">Votre plateforme de demande d'acte académique</p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">ActesEnLigne</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Utilisateurs</a></li>
        </ol>
    </div>
</div>



<div class="row">
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
                                    <table class="display" style="width:100%">
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
