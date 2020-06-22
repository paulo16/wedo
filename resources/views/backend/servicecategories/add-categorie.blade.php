<div class="modal fade" id="modal-categorie">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
                <h4 class="modal-title">
                    Categorie
                </h4>
            </div>
            <div class="modal-body">
                <form id="form-categorie"  enctype="multipart/form-data">
                    <input id="id-categorie" type="hidden" value=""/>
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="control-label" for="titre">
                                    Titre
                                </label>
                                <input class="form-control" id="nom" name="nom" type="text" value=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="description">
                                    Description
                                </label>

                                <input class="form-control" id="description" name="description" type="text" value=""/>

                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image">Mettez une Photo</label>
                                <input class="dropify form-control"  name="image" type="file" id="image" />
                            </div>

                        </div>
                    </div>
                    <br>
                    <button class="btn btn-primary" id="sousmettre-categorie" type="submit">
                        Mettre à jour
                    </button>
                    <br>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal" type="button">
                    Fermer
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>