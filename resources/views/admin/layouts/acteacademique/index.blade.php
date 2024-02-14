@extends('admin.dashboard')

@section('title', 'Liste acte')

@section('content')

@if (session('success'))
    <div class="alert alert-success solid ">
        <strong>Success!</strong> {{ session('success') }}
    </div>
@endif

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
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Actes</a></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Liste des actes académiques</h4>

                <div class="d-flex text-end">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal-create-acte-academique">Ajouter</button>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Intitulé de l'acte</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($actes as $acte)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$acte->type_acte}}</td>
                                    <td>{!!$acte->description!!}</td>
                                    <td>
                                            <span>
                                                <a title="Modifier" class="btn btn-warning" data-toggle="modal" data-target="#basicModal-edit-acte-academique-{{$acte->id}}">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                            </span>
                                        @include('admin.layouts.acteacademique.edit-acte',["acte"=>$acte])

                                        <form action="{{ route('actes.destroy', $acte->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button title="Supprimer" type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet acte ?')">
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
                                <th>Intitulé de l'acte</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@include('admin.layouts.acteacademique.create-acte')

@endsection