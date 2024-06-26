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
    <div class="col-lg-12 margin-tb">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h2>Gestion des Etudiants</h2>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#basicModal-create-user-etudiant">Ajouter un nouveau étudiant</button>
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
                                <th width="280px">Option</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th width="280px">Actions</th>
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
                              <td class="align-middle">
                                <div class="d-flex justify-content-flex-start">
                                    <a class="btn btn-primary btn-sm mr-1" data-toggle="modal" data-target="#basicModal-edit-user-etudiant-{{$etudiant->id}}">Modifier</a>
                                    @include('admin.layouts.utilisateurs.edit-etudiant',["etudiant"=>$etudiant])
                                    {!! Form::open(['method' => 'DELETE','route' => ['utilisateur.supetudiant', $etudiant->id],'style'=>'display:inline','onsubmit' => "return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')"]) !!}
                                        @csrf
                                        {!! Form::submit('Supprimer', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                </div>
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
                                <th width="280px">Option</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th width="280px">Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
  </div>
</div>

@include('admin.layouts.utilisateurs.create-etudiant')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h2>Gestion des Administrateurs</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('users.create') }}"> Ajouter un nouveau admin</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tableAdmin" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Roles</th>
                                <th width="280px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->contact }}</td>
                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                            <label class="badge badge-success">{{ $v }}</label>
                                        @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Voir</a>
                                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Modifier</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Roles</th>
                                <th width="280px">Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


{!! $data->render() !!}

@endsection
