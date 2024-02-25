@extends('layouts.student')

@section('title',"Suivre votre demande")
    
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Demande/Suivie</a></li>
                </ol>
            </div>
        </div>
       <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@yield('title')</h4>
                </div>
                <div class="card-body">
                    <form  action=" {{ route('student.suivie.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <h4>Entre Le code a neuf (09) chiffre que vous avez recu</h4>
                            <section>
                                    <div class="row">
                                        <div class="col-lg-6 mb-4">
                                            <div class="form-group">
                                                <label for="otp" class="form-label"><strong>OTP CODE <span style="color:red">*</span></strong></label>
                                                <input id="otp" type="text" class="form-control  @error('otp') is-invalid  @enderror" name="otp" required autocomplete="otp" placeholder="Entrez le code de la demande">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="text-center mt-4">
                                                <button type="submit" class="btn btn-primary btn-block">Vérifier</button>
                                            </div>
                                        </div>
                                    </div>
                            </section>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Succès!',
                text: "{{ session('success') }}",
            });
        });
    </script>
@endif

@if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Erreur!',
                text: "{{ session('error') }}",
            });
        });
    </script>
@endif

@endsection