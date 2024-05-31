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
                        <p>Bonjour {{ $data['nom']}}&nbsp;{{ $data['prenoms'] }},</p>

                        <p>Nous avons le plaisir de vous informer que votre demande pour l'acte {{ $data['actedemande'] }} a été traitée avec succès.</p>

                        <p>Voici les détails de votre demande :</p>
                        <ul>
                            <li>Code de la demande : {{ $data['codedemande'] }}</li>
                            <li>Acte demandé : {{ $data['actedemande'] }}</li>
                        </ul>

                        <p>Vous trouverez ci-joint votre acte demandé :</p>
                        <div class="mt-2 mb-2">
                            <p>
                                <i>Cordiallement,
                                    L'équipe de ActesEnLigne
                                </i>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
