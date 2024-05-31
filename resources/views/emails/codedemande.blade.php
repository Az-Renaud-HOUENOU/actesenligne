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

                    <div class="success-inner">
                        <h1><i class="fa fa-envelope"></i><span>Code de votre demande de {{$data['actedemande']}}</span></h1>
                        <p>Mr/Mme, votre demande de {{$data['actedemande']}} a été
                            reçue et bien enregistrée sous le code de demande <u><b>{{ $data['codedemande'] }}.</b></u>
                        </p>
                        <p>Suivez désormais votre demande sur ActesEnLigne avec votre code de demande.</p>

                        <div class="mt-2 mb-2">
                            <p>
                                <i>Cordiallement,
                                   Institut de Formation et de Recherche en Informatique de l'Université d'Abomey-Calavi
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
