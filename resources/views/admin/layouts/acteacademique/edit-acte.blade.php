<div class="bootstrap-modal">
    <div class="modal fade" id="basicModal-create-acte-academique">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un acte academique</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('actes.update', $post->id) }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="intitule_acte" class="form-label">Type d'acte</label>
                                <input type="text" name="intitule_acte" class="form-control" value="{{ $acte->type_acte }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="" class="form-control" cols="5" rows="4">{{ $acte->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
