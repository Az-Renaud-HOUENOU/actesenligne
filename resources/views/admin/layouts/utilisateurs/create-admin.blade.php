<div class="bootstrap-modal">
    <div class="modal fade" id="basicModal-create-user-admin">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un administrateur</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('utilisateur.storeadmin') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nom_admin" placeholder="Nom et prénom de l'administrateur">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email_admin" placeholder="Email de l'administrateur">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Fonction</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="fonction_admin" placeholder="Fonction de l'administrateur">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Téléphone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="telephone_admin" placeholder="Téléphone de l'administrateur">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Mot de Passe</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password_admin" placeholder="Mot de passe de l'administrateur">
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
