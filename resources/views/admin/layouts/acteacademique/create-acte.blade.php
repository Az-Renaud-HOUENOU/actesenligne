<div class="bootstrap-modal">
    <div class="modal fade" id="basicModal-create-acte-academique">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un acte academique</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('actes.store') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="intitule_acte" class="form-label">Type d'acte</label>
                                <input type="text" name="intitule_acte" class="form-control" placeholder="L'intitulé de l'acte">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="summernote" cols="5" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:#FFA446; border:none">Annuler</button>
                        <button type="submit" class="btn btn-primary" style="background-color:#45B37E; border:none">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
