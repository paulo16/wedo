<form class="dash-profile-form">

    <!-- Basic Info -->
    <div class="tr-single-box">
        <div class="table-responsive">
            <br>
            <table class="table table-striped table-2 table-hover">
                <thead>
                    <tr>
                        <th>prestataire Name</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
                        <th>Email</th>
                        <th>Ville</th>
                        <th>Lieux</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            <span class="c-box-checkbox">
                                <input id="ls-1" class="checkbox-custom" name="ls-1" type="checkbox">
                                <label for="ls-1" class="checkbox-custom-label"></label>
                            </span>
                            <a href="#">Slovilla Exx Bars</a>
                        </td>
                        <td>Téléphone</td>
                        <td>Adresse</td>
                        <td>Email</td>
                        <td>Ville</td>
                        <td>Lieux</td>
                        <td>
                            <div class="badge badge-warning">Pending</div>
                        </td>
                        <td>
                            <div class="btn-group fl-right">
                                <button type="button" class="btn-trans" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti-more"></i>
                                </button>
                                <div class="dropdown-menu pull-right animated flipInX">
                                    <a href="#">Annuler</a>
                                    <a href="#">View</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tr-single-header">
            <h4><i class="ti-share"></i> Basic Information</h4>
        </div>

        <div class="tr-single-body">
            <div class="form-group">
                <label>Présentation du prestataire</label>
                <input class="form-control" type="text">
            </div>
            <div class="form-group">
                <label>Téléphone</label>
                <input class="form-control" type="text">
            </div>
            <div class="form-group">
                <label>Adresse</label>
                <input class="form-control" type="text">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email">
            </div>
            <div class="form-group">
                <label>Ville</label>
                <input class="form-control" type="text">
            </div>
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="cover-image">
                    <label class="custom-file-label" for="cover-image">Cover Image</label>
                </div>
            </div>
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="featured-image">
                    <label class="custom-file-label" for="featured-image">Image</label>
                </div>
            </div>
            <div class="form-group">
                <label>Lieux</label>
                <textarea class="form-control"></textarea>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary full-width mb-4">Save Changes</button>

</form>