<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ActesEnLigne IFRI-UAC</title>
</head>

<body>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <section class="mail-seccess section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12">
                    {{-- <div class="text-center mx-auto">
                        <img src="https://www.ifri-uac.bj/{{ $data['motif_rejet'] }}" alt="">
                    </div> --}}
                    <div class="success-inner">

                        <h1><i class="fa fa-envelope"></i><span>Réponse de IFRI-UAC à votre demande d'acte
                                académique</span></h1>


                        <p>
                            Mr/Mme {{ $data['nom'] }}&nbsp;{{ $data['prenoms'] }}, votre demande de  {{ $data['actedemande'] }} enregistré sous le code de demande
                            <u><b>{{ $data['code_demande'] }}</b></u> a été rejeté pour {{ $data['motif_rejet'] }} Merci !
                        </p>

                        <p>Suivez votre demande sur notre site avec votre code de demande.</p>

                        <div class="mt-2 mb-2">
                            <p class="text-end">
                                <i>Institut de Formation et de Recherche en Informatique de l'Université d'Abomey-Calavi
                                </i>
                            </p>
                        </div>
                        <a href="https://www.ifri-uac.bj" class="btn btn-primary btn-lg">Retourner sur ActesEnLigne
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
