@extends('admin.dashboard')

@section('title', 'Les Statistiques')

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
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Statistiques</a></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h2>Statistiques des demandes par mois</h2>
                </div>
                <div class="pull-right">
                    <a type="button" class="btn btn-success" href="{{ route('exporter.statistique') }}" style="background-color:#45B37E;">Exporter en pdf</a>
                </div>
            </div>
            <div class="card-body">
                <canvas id="demandesChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('demandesChart').getContext('2d');
    var labels = {!! json_encode(array_keys($demandesParMois)) !!}; // Tableau des étiquettes (mois)
    var data = {!! json_encode(array_values($demandesParMois)) !!}; // Tableau des valeurs (nombre de demandes)

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Nombre de demandes',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Couleur de fond des barres
                borderColor: 'rgba(54, 162, 235, 1)', // Couleur de bordure des barres
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true // Axe y commence à 0
                }
            }
        }
    });
</script>
@endsection
