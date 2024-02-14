@extends('layouts.student')

@section('title',"Demande d'acte")
    
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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Composants</a></li>
                </ol>
            </div>
        </div>
       <p>Veuillez remplir en suivant rigourusement les regles donnees, le formulaire suivant pour votre demande Champ obligatoire *</p>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">@yield('title')</h4>
                            </div>
                            <div class="card-body">
                                <form action=" {{ route('student.demande.store') }}" method="GET" id="step-form-horizontal" class="step-form-horizontal" enctype="multipart/form-data">
                                    <div>
                                        <h4>INFORMATIONS PERSONNELLES</h4>
                                        <section>
                                            <div class="row">
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Nom <span style="color:red">*</span></label>
                                                        <input type="text" name="nom" class="form-control  @error('nom') is-invalid  @enderror" placeholder="Votre nom" value="{{$etudiant->nom}}" readonly>
                                                        @error('nom')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Prénoms <span style="color:red">*</span></label>
                                                        <input type="text" name="prenom" class="form-control @error('prenom') is-invalid  @enderror " value="{{$etudiant->prenom}}" readonly placeholder="Votre prénom" >
                                                        @error('prenom')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>  
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Matricule <span style="color:red">*</span></label>
                                                        <input type="number" name="matricule" class="form-control  @error('matricule') is-invalid  @enderror" placeholder="Votre matricule" value="{{$etudiant->matricule}}" readonly >
                                                        @error('matricule')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>  
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Option <span style="color:red">*</span></label>
                                                        <input type="text" name="option" class="form-control @error('option') is-invalid  @enderror" placeholder="Votre option" value="{{$etudiant->option}}" required readonly>
                                                        @error('option')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>  
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Email <span style="color:red">*</span></label>
                                                        <div class="input-group">
                                                            <input type="email" name="email" class="form-control @error('email') is-invalid  @enderror" placeholder="example@example.com" value="{{$etudiant->email}}" readonly id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2">
                                                        </div>
                                                        @error('email')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>  
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Telephone <span style="color:red">*</span></label>
                                                        <div class="input-group">
                                                            <input type="number" name="numero" class="form-control @error('numero') is-invalid  @enderror" placeholder="Votre numro de téléphone" value="{{$etudiant->contact}}" readonly>
                                                        </div>
                                                        @error('numero')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>  
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Année académique <span style="color:red">*</span></label>
                                                        <select name="annee-academique" class="form-control" required>
                                                            <option selected>Sélectionner...</option>
                                                            <option>2013 - 2014</option>
                                                            <option>2014 - 2015</option>
                                                            <option>2015 - 2016</option>
                                                            <option>2016 - 2017</option>
                                                            <option>2017 - 2018</option>
                                                            <option>2018 - 2019</option>
                                                            <option>2019 - 2020</option>
                                                            <option>2020 - 2021</option>
                                                            <option>2021 - 2022</option>
                                                            <option>2022 - 2023</option>
                                                            <option>2023 - 2024</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <h4>JOINDRE LES PIECES</h4>
                                        <section>
                                            <div class="row">
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Copie de la fiche de préinscription validée de l'année acdémique concernée <span style="color:red">*</span></label>
                                                        <input type="file" name="fichepre_valid" class="form-control   @error('fichepre_valid') is-invalid  @enderror" placeholder="Votre Copie de la fiche de préinscription validée" >
                                                        @error('fichepre_valid')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>  
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Copie simple de l'acte de naissance <span style="color:red">*</span></label>
                                                        <input type="file" name="acte_nais" class="form-control  @error('acte_nais') is-invalid  @enderror" placeholder="acte de naissance" >
                                                        @error('acte_nais')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>  
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Copie simple du Certificat d'Identification Personnelle (CIP) <span style="color:red">*</span></label>
                                                        <input type="file" name="cip" class="form-control  @error('cip') is-invalid  @enderror" placeholder="Votre CIP" >
                                                        @error('cip')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>  
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Copie de la fiche de pré-inscription validée de la dernière année académique <span style="color:red">*</span></label>
                                                        <input type="file" name="fiche_prederniere" class="form-control  @error('fiche_prederniere') is-invalid  @enderror" placeholder="Votre fiche de pré-inscription validée de la dernière année académique" >
                                                        @error('fiche_prederniere')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>  
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Copie du relevé de notes du 1er semestre <span style="color:red">*</span></label>
                                                        <input type="file" name="releve_sem1" class="form-control  @error('releve_sem1') is-invalid  @enderror" placeholder="Votre relevé de notes du 1er semestre" >
                                                        @error('releve_sem1')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>  
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Copie du relevé de notes du 2è semestre <span style="color:red">*</span></label>
                                                        <input type="file" name="releve_sem2" class="form-control  @error('releve_sem2') is-invalid  @enderror" placeholder="Votre relevé de notes du 2è semestre" >
                                                        @error('releve_sem2')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>  
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Copie du relevé de notes du 3è semestre <span style="color:red">*</span></label>
                                                        <input type="file" name="releve_sem3" class="form-control  @error('releve_sem3') is-invalid  @enderror" placeholder="Votre relevé de notes du 3è semestre" >
                                                        @error('releve_sem3')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>  
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Copie du relevé de notes du 4è semestre <span style="color:red">*</span></label>
                                                        <input type="file" name="releve_sem4" class="form-control  @error('releve_sem4') is-invalid  @enderror" placeholder="Votre relevé de notes du 4è semestre" >
                                                        @error('releve_sem4')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>  
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Copie du relevé de notes du 5è semestre <span style="color:red">*</span></label>
                                                        <input type="file" name="releve_sem5" class="form-control  @error('releve_sem5') is-invalid  @enderror" placeholder="Votre relevé de notes du 5è semestre" >
                                                        @error('releve_sem5')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>  
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Copie du relevé de notes du 6è semestre <span style="color:red">*</span></label>
                                                        <input type="file" name="releve_sem6" class="form-control  @error('releve_sem6') is-invalid  @enderror" placeholder="Votre relevé de notes du 6è semestre" >
                                                        @error('releve_sem6')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>  
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label"> Original du quitus de dépôt du mémoire corrigé après la soutenance <span style="color:red">*</span></label>
                                                        <input type="file" name="quit_memo" class="form-control  @error('quit_memo') is-invalid  @enderror" placeholder="Votre Quitus de dépôt du mémoire corrigé après la soutenance" >
                                                        @error('quit_memo')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>  
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Copie de l'attestation de diplôme <span style="color:red">*</span></label>
                                                        <input type="file" name="copie_attes" class="form-control  @error('copie_attes') is-invalid  @enderror" placeholder="Votre attestation de diplôme" >
                                                        @error('copie_attes')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>  
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Copie du diplôme <span style="color:red">*</span></label>
                                                        <input type="file" name="copie_dipl" class="form-control  @error('copie_dipl') is-invalid  @enderror" placeholder="Votre diplôme" >
                                                        @error('copie_dipl')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>  
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Demande adressée au Directeur de l'IFRI <span style="color:red">*</span></label>
                                                        <input type="file" name="demande_diro" class="form-control  @error('demande_diro') is-invalid  @enderror" placeholder="Une demande adressée au directeur de l'IFRI" >
                                                        @error('demande_diro')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>  
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label ">Copie de l'acte ou des actes à certifier <span style="color:red">*</span></label>
                                                        <input type="file" name="copie_act" class="form-control   @error('copie_act') is-invalid  @enderror " placeholder="L'acte ou les actes à certifier" multiple>
                                                        @error('copie_act')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>  
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <h4>INFORMATIONS SUR LE PAIEMENT</h4>
                                        <section>
                                            <div class="row">
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Numéro de paiement <span style="color:red">*</span></label>
                                                        <input type="number" name="pay_num" class="form-control  @error('pay_num') is-invalid  @enderror" placeholder="Numéro de la quittance de paiement" >
                                                        @error('pay_num')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>  
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Preuve de paiement (Quittance) <span style="color:red">*</span></label>
                                                        <input type="file" name="preuve" class="form-control @error('preuve') is-invalid  @enderror" placeholder="Numero de paiements" >
                                                        @error('preuve')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>  
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <h4>Email Setup</h4>
                                        <section>
                                            <div class="row emial-setup">
                                                <div class="col-sm-3 col-6">
                                                    <div class="form-group">
                                                        <label for="mailclient11" class="mailclinet mailclinet-gmail">
                                                            <input type="radio" name="emailclient" id="mailclient11">
                                                            <span class="mail-icon">
                                                                <i class="mdi mdi-google-plus" aria-hidden="true"></i>
                                                            </span>
                                                            <span class="mail-text">I'm using Gmail</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-6">
                                                    <div class="form-group">
                                                        <label for="mailclient12" class="mailclinet mailclinet-office">
                                                            <input type="radio" name="emailclient" id="mailclient12">
                                                            <span class="mail-icon">
                                                                <i class="mdi mdi-office" aria-hidden="true"></i>
                                                            </span>
                                                            <span class="mail-text">I'm using Office</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-6">
                                                    <div class="form-group">
                                                        <label for="mailclient13" class="mailclinet mailclinet-drive">
                                                            <input type="radio" name="emailclient" id="mailclient13">
                                                            <span class="mail-icon">
                                                                <i class="mdi mdi-google-drive" aria-hidden="true"></i>
                                                            </span>
                                                            <span class="mail-text">I'm using Drive</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-6">
                                                    <div class="form-group">
                                                        <label for="mailclient14" class="mailclinet mailclinet-another">
                                                            <input type="radio" name="emailclient" id="mailclient14">
                                                            <span class="mail-icon">
                                                                <i class="fa fa-question-circle-o"
                                                                    aria-hidden="true"></i>
                                                            </span>
                                                            <span class="mail-text">Another Service</span>
                                                        </label>
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
@endsection