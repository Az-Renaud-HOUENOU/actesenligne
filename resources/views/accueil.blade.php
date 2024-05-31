@extends("layouts.app")

@section("content")
<main class="bg-white" style="height: 82.5%;">
    <section class="login-page" style="font-family: Poppins;">
        <div class="row shadow b-" style="min-height: 82.4vh; background: linear-gradient(#0077d2 50%, #0077d1 70.25%, #003c69 100%);">

            <div class="col-md-6 px-4 d-none d-lg-block bg-light- shadow">
                <div class="row px-3 h-100">
                    <div class="my-auto px-4">
                        <h2 class="text-uppercase text-black- fw-bold" style="line-height: 45px">
                            Bienvenue sur la plateforme DE la<br>
                            DEMANDE DES ACTES ACADÉMIQUES <br>
                            des étudiants de l'IFRI.
                        </h2>
                        <p class="mt-4 text-secondary text-5 text-justify lh-lg">
                            Vous pouvez demander votre acte académique après une connexion approuvée. Il faut donc être un étudiant à IFRI connaissant ses identifiants.
                            Ces actes académiques sont établis et delivrés par l'Institut de Formation et de Recherche en Informatique. <br>

                            Connectez-vous en toute sécurisé et confidentialité. Merci !
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 text-white py-5">
                <div class="row h-100">
                    <div class="col-md-6 col-lg-8 col-sm-8 col-10 my-auto mx-auto">
                        <h4 class="text-center" style="font-family: Poppins;">DEMANDER UN ACTE</h4>
                        <p class="text-center" style="font-family: Poppins;">Se connecter à son compte étudiant</p> <br>
                        
                        <form method="POST" action="{{ route('etudiant.login') }}">
                            @csrf
                            <div class="input-group mt-4">
                                
                                <input type="text" placeholder='Matricule' id="matricule" name="matricule" class="form-control @error('matricule') is-invalid @enderror border-0" value="{{ old('matricule') }}" required autocomplete="matricule" autofocus>
                                <label for="matricule" class='input-group-text bg-white border-0'><i class='uil uil-user text-secondary fs-5'></i></label>

                                @error('matricule')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <span class='error'></span>

                            <div class="input-group mt-4">
                                
                                <input type="password" class="form-control @error('password') is-invalid @enderror border-0" placeholder='Mot de passe' id="password" value='' name="password">
                                <label for="password" class='input-group-text bg-white border-0'><i class='uil uil-lock text-secondary fs-5'></i></label>
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <span class='error'></span>

                            <div class="float-end my-3">
                                <span data-bs-toggle="modal" type="button" data-bs-target="#exampleModal" class="text-decoration-none text-white">Mot de passe oublié ?</span>
                            </div>
                            <div>
                                <input type="submit" value="SE CONNECTER" class="login-button" name="">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="exampleModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-body">
                    <h4 class="text-black fw-bold my-2">Mot de passe oublié ?</h4>
                    <hr>
                    <p class="text-color-">Veuillez-vous rapprocher de l'administration d'IFRI pour avoir un nouveau mot de passe.</p>
                    <button type="button" data-bs-dismiss="modal" class="login-button w-100">D'accord Merci</button>
                </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection