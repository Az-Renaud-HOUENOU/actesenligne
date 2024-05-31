
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>  @yield('title') Dashboard Etudiant</title>

    <meta name="description" content="Le site officiel de L'Institut de Formation et de Recherche en Informatique de L'UAC">

    <meta name="keywords" content="IFRI, UAC, Informatique, Bénin, Recherche, Institut, Ecole, Ingenierie, Université, Sécurité Informatique, Génie Logiciel, Internet et Multimédia, Système d'Information et rédeaux Informatiques, Ordinateur, Programmation, LRSIA, WICSI, IFRI ALUMNI">
    <meta name="author" content="Institut de Formation et de Recherche en Informatique" >
    <meta name="robots" content="noodp"/>
    <link rel="canonical" href="{{url('http://www.ifri-uac.bj')}}" />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Institut de Formation et de Recherche en Informatique - Université d'Abomey-Calavi" />
    <meta property="og:description" content="Le site officiel de L'Institut de Formation et de Recherche en Informatique de L'UAC " />
    <meta property="og:url" content="http://ifri-uac.bj" />
    <meta property="og:site_name" content="Institut de Formation et de Recherche en Informatique - Université d'Abomey-Calavi" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="Le site officiel de L'Institut de Formation et de Recherche en Informatique de L'UAC " />
    <meta name="twitter:title" content="Institut de Formation et de Recherche en Informatique - Université d'Abomey-Calavi" />

    <!--================= SITE ICON ===============-->
    <link rel="icon" type="image/x-icon" href="{{asset('images/logoifri.jpg')}}">

    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!--================= CSS BOOTSTRAP ===============-->
    <link rel="stylesheet" href=" {{ asset('student/vendor/jqvmap/css/jqvmap.min.css') }} ">
	<link rel="stylesheet" href=" {{ asset('student/vendor/chartist/css/chartist.min.css') }} ">

	<link rel="stylesheet" href=" {{ asset('student/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('student/css/style.css') }}">
    <link rel="stylesheet" href=" {{ asset('student/css/skin-3.css') }} ">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

    <link href="{{ asset('admin/vendor/jquery-steps/css/jquery.steps.css') }}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
