@extends('layouts.student')

@section('title',"Notifications")
    
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Notifications</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Toutes mes notifications</h4>
                    </div>
                    <div class="card-body">
                        <ul>
                            @foreach ($notifications as $notification)
                                <li>
                                    {{ $notification['type_acte_demande'] }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

