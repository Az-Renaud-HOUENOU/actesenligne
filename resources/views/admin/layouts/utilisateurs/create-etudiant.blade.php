<div class="bootstrap-modal">
    <div class="modal fade" id="basicModal-create-user-etudiant">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un étudiant</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('utilisateur.storeetudiant') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Matricule</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="matricule_etudiant" placeholder="Matricule de l'étudiant">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nom_etudiant" placeholder="Nom de l'étudiant">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Prénom(s)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="prenom_etudiant" placeholder="Prénom(s) de l'étudiant">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Option</label>
                            <div class="col-sm-10">
                                <select class="custom-select" id="inlineFormCustomSelect" name="option_etudiant">
                                    <option selected>Option de l'étudiant...</option>
                                    <option value="1">Génie Logiciel</option>
                                    <option value="2">Sécurité Informatique</option>
                                    <option value="3">Internet et Multimédia</option>
                                    <option value="4">Systèmes Embarqués et Internet des Objets</option>
                                    <option value="5">Intelligence Artificielle</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email_etudiant" placeholder="Email de l'étudiant">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Téléphone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="telephone_etudiant" placeholder="Téléphone de l'étudiant">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Mot de Passe</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password_etudiant" placeholder="Mot de passe de l'étudiant">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
