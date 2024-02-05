@extends('layouts.student')

@section('title', 'Student Dashboard')
    
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
            
    <div>
        <p>Sélectionner le type d'acte académique que vous voulez obtenir:</p>
        <form id="typeActeForm">
            <!-- Formulaire de sélection des types d'actes (touches radio) -->
        </form>
        <div id="descriptionBlock">
            <!-- Bloc pour afficher la description de l'acte sélectionné -->
        </div>
        <button id="obtenirButton" style="display:none;">Obtenir</button>
    </div>
        
    </div>
</div>
@endsection

<script>
        // Assume que tu as une variable JavaScript avec les types d'actes et leurs descriptions
        const actesAcademiques = {
            "type1": "Description de l'acte 1",
            "type2": "Description de l'acte 2",
            // ...
        };

        // Obtient la référence vers les éléments HTML
        const typeActeForm = document.getElementById('typeActeForm');
        const descriptionBlock = document.getElementById('descriptionBlock');
        const obtenirButton = document.getElementById('obtenirButton');

        // Écoute les changements dans le formulaire de sélection des types d'actes
        typeActeForm.addEventListener('change', (event) => {
            const typeActeSelectionne = event.target.value;
            const description = actesAcademiques[typeActeSelectionne];
                
            // Affiche la description de l'acte sélectionné
            descriptionBlock.innerHTML = `<p>${description}</p>`;

            // Affiche le bouton "Obtenir"
            obtenirButton.style.display = 'block';
        });

        // Écoute le clic sur le bouton "Obtenir"s
        obtenirButton.addEventListener('click', () => {
        // Redirige l'étudiant vers le formulaire de demande
        window.location.href = "{{ route('student.demande.index') }}?typeActe=" + typeActeForm.querySelector(':checked').value;
    });
</script>
