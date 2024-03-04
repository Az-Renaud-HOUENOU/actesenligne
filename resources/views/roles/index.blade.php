@extends('admin.dashboard')

@section('title', 'Rôles')

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
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Rôles</a></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h2>Gestion de Rôle</h2>
                </div>
                <div class="pull-right">
                    {{-- @can('role-create') --}}
                        <a class="btn btn-success" href="{{ route('roles.create') }}"> Créer un nouveau rôle</a>
                    {{-- @endcan --}}
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tableroles" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th width="280px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Voir</a>
                                    @can('role-edit')
                                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Modifier</a>
                                    @endcan
                                    @can('role-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
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

{!! $roles->render() !!}
@endsection
