@extends('layouts.student')

@section('title', 'Student Dashboard')

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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Tableau de bord étudiant</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sélectionner le type d'acte académique que vous voulez obtenir:</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="basic-form">
                                    <form id="typeActeForm" method="POST">
                                        @foreach($actes as $acte)
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label >
                                                        <input type="radio" name="optradio" class="acteSelectionne" value="{{ $acte->type_acte }}" data-type="{{ $acte->type_acte }}" data-id="{{ $acte->id }}" data-description="{{$acte->description}}">
                                                        {{$acte->type_acte}}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div id="divDescription" style="display:none;">
                                    <h4 id="titreActe"></h4><br>
                                    <div id="descriptionActe"></div>
                                    <div class="d-flex text-end">
                                        <div id="btnacte"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-xxl-12">
                                <p>
                                    NB: Tout paiement de frais sont à verser sur le compte de l'Institut ouvert dans les livres du Trésor public: <br>
                                    <ul>
                                        <li>Numéro du compte: <strong>BJ660 01001 000001044774 37;</strong></li>
                                        <li>Ce compte est accessible pour les paiements en ligne via le lien <strong><a href="https://equittancetresor.finances.bj:9051/paiement/">https://equittancetresor.finances.bj:9051/paiement/</a></strong> ou en espèces à la Direction générale
                                        du Trésor et de la Comptabilité public (DGTCP) du Ministère de l'Economie et des Finances.</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var acteRadios = document.querySelectorAll('.acteSelectionne');
        var divDescription = document.getElementById('divDescription');
        var descriptionActe = document.getElementById('descriptionActe');
        var BtnActe = document.getElementById('btnacte');

        var obtenirButton = document.getElementById('obtenirButton');
        var titreActe = document.getElementById('titreActe');

        acteRadios.forEach(function (radio) {
            radio.addEventListener('change', function () {
                var description = this.getAttribute('data-description');
                let acte = this.getAttribute('data-id');
                let nomacte = this.getAttribute('data-type');
                var titre = this.nextSibling.nodeValue.trim();
                descriptionActe.innerHTML = description;
                titreActe.innerHTML = titre;

                let url = "{{ route('student.demande.index', ['demande' => ':demande', 'nomacte' => ':nomacte']) }}"
                    .replace(':demande', acte)
                    .replace(':nomacte', nomacte);

                BtnActe.innerHTML = '<a href="' + url + '" class="btn btn-primary has-arrow">Obtenir</a>';
                divDescription.style.display = 'block';
                obtenirButton.style.display = 'block';

            });
        });
    });
</script>

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Succès!',
                text: "{{ session('success') }}",
                showConfirmButton:true,
                closeOnConfirm:true,
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif

@endsection
