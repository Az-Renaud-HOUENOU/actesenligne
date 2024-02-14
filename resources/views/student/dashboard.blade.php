@extends('layouts.student')

@section('title', 'Student Dashboard')

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome!</h4>
                    <p class="mb-0">Your business dashboard template</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Blank</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form step</h4>
                    </div>
                    <div class="card-body">
                        <p>Sélectionner le type d'acte académique que vous voulez obtenir:</p>
                        <div class="row">
                            <div class="col-xl-6">
                                <!--col-xl-4 col-lg-6 col-xxl-6 col-md-6 -->
                                <div class="basic-form">
                                    <form id="typeActeForm">
                                        <div class="form-group">
                                            @foreach($actes as $acte)
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="optradio" id="acteselectionne">{{$acte->type_acte}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div id="divDescription">

                                    <div class="d-flex text-end">
                                        <button class="has-arrow" id="obtenirButton" style="display:none;"><a href="{{route('student.demande.index')}}">Obtenir</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function afficherDiv(){
        var div2=document.getElementById('divDescription');
        div2.style.display='block';
    }
</script>
@endsection