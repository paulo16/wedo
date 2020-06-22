@extends('backend.default')

@section('head')
<title>wedo | dashbord</title>
@endsection

@section('content')
<div>
    <div class="alert alert-success">
        Congratulation! your listing has been approved. <a href="listing-detail.html" class="alert-link">Click Here </a> to View.
    </div>

    <!-- row -->
    <div class="row">

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="widget simple-widget">
                <div class="rwidget-caption info">
                    <div class="row">
                        <div class="col-4 pr-0">
                            <i class="text-info icon ti-list"></i>
                        </div>
                        <div class="col-8 pl-0">
                            <div class="widget-detail">
                                <h3>372</h3>
                                <span>Prestataires</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="widget-line">
                                <span style="width:80%;" class="bg-info widget-horigental-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="widget simple-widget">
                <div class="widget-caption danger">
                    <div class="row">
                        <div class="col-4 pr-0">
                            <i class="text-danger icon ti-reload"></i>
                        </div>
                        <div class="col-8 pl-0">
                            <div class="widget-detail">
                                <h3>08</h3>
                                <span>annulations</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="widget-line">
                                <span style="width:50%;" class="bg-danger widget-horigental-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="widget simple-widget">
                <div class="widget-caption warning">
                    <div class="row">
                        <div class="col-4 pr-0">
                            <i class="text-success icon ti-stats-down"></i>
                        </div>
                        <div class="col-8 pl-0">
                            <div class="widget-detail">
                                <h3>18</h3>
                                <span>réservations</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="widget-line">
                                <span style="width:60%;" class="bg-success widget-horigental-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="widget simple-widget">
                <div class="widget-caption purple">
                    <div class="row">
                        <div class="col-4 pr-0">
                            <i class="text-purple icon ti-money"></i>
                        </div>
                        <div class="col-8 pl-0">
                            <div class="widget-detail">
                                <h3>4770</h3>
                                <span>Chiffre d’affaire</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="widget-line">
                                <span style="width:40%;" class="bg-purple widget-horigental-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- row -->
<div class="row">
    <!-- Analytics Overview -->
    <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0"><i class="ti-bar-chart"></i>Analytics Overview</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-2 table-hover">
                        <thead>
                            <tr>
                                <th>Prestataire Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <span class="c-box-checkbox">
                                        <input id="ps-1" class="checkbox-custom" name="ps-1" type="checkbox">
                                        <label for="ps-1" class="checkbox-custom-label"></label>
                                    </span>
                                    <a href="#"><img src="assets/img/2.jpg" class="avatar img-circle" alt="Avatar">Slovilla Exx Bars</a>
                                </td>



                                <td>
                                    <div class="badge badge-success">Active</div>
                                </td>
                                <td>

                                    <div class="btn-group fl-right">
                                        <button type="button" class="btn-trans" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-trash"></i>
                                        </button>

                                    </div>
                                    <div class="btn-group fl-right">
                                        <button type="button" class="btn-trans" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-check-box"></i>
                                        </button>

                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="c-box-checkbox">
                                        <input id="ps-1" class="checkbox-custom" name="ps-1" type="checkbox">
                                        <label for="ps-1" class="checkbox-custom-label"></label>
                                    </span>
                                    <a href="#"><img src="assets/img/2.jpg" class="avatar img-circle" alt="Avatar">Slovilla Exx Bars</a>
                                </td>



                                <td>


                                    <div class="badge badge-info">On Hold</div>
                                </td>
                                <td>

                                    <div class="btn-group fl-right">
                                        <button type="button" class="btn-trans" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-trash"></i>
                                        </button>

                                    </div>
                                    <div class="btn-group fl-right">
                                        <button type="button" class="btn-trans" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-check-box"></i>
                                        </button>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="c-box-checkbox">
                                        <input id="ps-1" class="checkbox-custom" name="ps-1" type="checkbox">
                                        <label for="ps-1" class="checkbox-custom-label"></label>
                                    </span>
                                    <a href="#"><img src="assets/img/2.jpg" class="avatar img-circle" alt="Avatar">Slovilla Exx Bars</a>
                                </td>



                                <td>
                                    <div class="badge badge-warning">Pending</div>
                                </td>
                                <td>

                                    <div class="btn-group fl-right">
                                        <button type="button" class="btn-trans" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-trash"></i>
                                        </button>

                                    </div>
                                    <div class="btn-group fl-right">
                                        <button type="button" class="btn-trans" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-check-box"></i>
                                        </button>

                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Browser Stats -->
    <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
        <div class="card">
            <div class="card-header">
                <h4><i class="ti-world"></i>Browser Services</h4>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-2 table-hover">
                        <thead>
                            <tr>
                                <th>Services Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <span class="c-box-checkbox">
                                        <input id="ps-1" class="checkbox-custom" name="ps-1" type="checkbox">
                                        <label for="ps-1" class="checkbox-custom-label"></label>
                                    </span>
                                    <a href="#"><img src="assets/img/2.jpg" class="avatar img-circle" alt="Avatar">Slovilla Exx Bars</a>
                                </td>



                                <td>
                                    <div class="badge badge-success">Active</div>
                                </td>
                                <td>

                                    <div class="btn-group fl-right">
                                        <button type="button" class="btn-trans" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-trash"></i>
                                        </button>

                                    </div>
                                    <div class="btn-group fl-right">
                                        <button type="button" class="btn-trans" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-check-box"></i>
                                        </button>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="c-box-checkbox">
                                        <input id="ps-1" class="checkbox-custom" name="ps-1" type="checkbox">
                                        <label for="ps-1" class="checkbox-custom-label"></label>
                                    </span>
                                    <a href="#"><img src="assets/img/2.jpg" class="avatar img-circle" alt="Avatar">Slovilla Exx Bars</a>
                                </td>



                                <td>


                                    <div class="badge badge-info">On Hold</div>
                                </td>
                                <td>

                                    <div class="btn-group fl-right">
                                        <button type="button" class="btn-trans" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-trash"></i>
                                        </button>

                                    </div>
                                    <div class="btn-group fl-right">
                                        <button type="button" class="btn-trans" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-check-box"></i>
                                        </button>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="c-box-checkbox">
                                        <input id="ps-1" class="checkbox-custom" name="ps-1" type="checkbox">
                                        <label for="ps-1" class="checkbox-custom-label"></label>
                                    </span>
                                    <a href="#"><img src="assets/img/2.jpg" class="avatar img-circle" alt="Avatar">Slovilla Exx Bars</a>
                                </td>



                                <td>
                                    <div class="badge badge-warning">Pending</div>
                                </td>
                                <td>

                                    <div class="btn-group fl-right">
                                        <button type="button" class="btn-trans" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-trash"></i>
                                        </button>

                                    </div>
                                    <div class="btn-group fl-right">
                                        <button type="button" class="btn-trans" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-check-box"></i>
                                        </button>

                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop