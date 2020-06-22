<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="myModalLabel1">
            <div class="modal-header">
                <h5 class="modal-title"><i class="ti-unlock"></i>Creat a Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-advance theme-bg" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link" data-toggle="tab" href="#employer" role="tab">
                            <i class="ti-user"></i> Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#candidate" role="tab">
                            <i class="ti-user"></i> Sign Up</a>
                    </li>
                </ul>
                <!-- Nav tabs -->
                <!-- Tab panels -->
                <div class="tab-content">
                    <!-- SignIn-->
                    <div class="tab-pane fade in show active" id="employer" role="tabpanel">
                        <form method="POST" action="{{ route('login') }}>
                               @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" type="password" type="password" class="form-control" placeholder="*********">
                            </div>
                            <div class="form-group">
                                <span class="c-box-checkbox">
                                    <input id="rmp-3" class="checkbox-custom" name="rmp-3" type="checkbox">
                                    <label for="rmp-3" class="checkbox-custom-label">Remember Me</label>
                                </span>
                                <a href="#" title="Forget" class="float-right">Forgot Password?</a>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn theme-btn full-width btn-m">LogIn </button>
                            </div>
                        </form>
                        <div class="log-option"><span>OR</span></div>
                        <div class="row mrg-bot-20">
                            <div class="col-md-6">
                                <a href="#" title="" class="fb-log-btn log-btn"><i class="fa fa-facebook"></i>SignUp With Facebook</a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" title="" class="gplus-log-btn log-btn"><i class="fa fa-google-plus"></i>SignUp With Google+</a>
                            </div>
                        </div>
                    </div>
                    <!--/.Panel 1-->
                    <!-- SignUp Panel -->
                    <div class="tab-pane fade" id="candidate" role="tabpanel">
                        <form>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" class="form-control" placeholder="User Name">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="*********">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn theme-btn full-width btn-m">Register</button>
                            </div>
                        </form>
                        <div class="log-option"><span>OR</span></div>
                        <div class="row mrg-bot-20">
                            <div class="col-md-6">
                                <a href="#" title="" class="fb-log-btn log-btn"><i class="fa fa-facebook"></i>SignUp With Facebook</a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" title="" class="gplus-log-btn log-btn"><i class="fa fa-google-plus"></i>SignUp With Google+</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>