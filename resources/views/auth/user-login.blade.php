<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Boooya - Login With Background</title>

        <!-- META SECTION -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- END META SECTION -->
        <!-- CSS INCLUDE -->
    <link rel="stylesheet" href="{!! asset('Backend/css/styles.css') !!}">
    <link rel="stylesheet" href="{!! asset('Backend/css/custom.css') !!}">
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>

        <!-- APP WRAPPER -->
        <div class="app app-fh">

            <!-- START APP CONTAINER -->
            <div class="app-container" style="background: url({!! asset('Backend/assets/images/background/bg-1.jpg') !!}) center center no-repeat fixed;">

                <div class="app-login-box">
                    <div class="app-login-box-user"><img src=" {!! asset('Backend/img/user/no-image.png') !!}"></div>
                    <div class="app-login-box-title">
                        <div class="title">Already a member?</div>
                        <div class="subtitle">Sign in to your account</div>
                        @include('Backend.partials.error')
                    </div>
                    <div class="app-login-box-container">
                        <form action="{{ route('user.login') }}" method="post">
                          {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('customer_id') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" name="customer_id" placeholder="Customer ID" value="{{ old('customer_id') }}" required>
                                @if ($errors->has('customer_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('customer_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('pin') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" name="pin" placeholder="IPIN" value="{{ old('pin') }}" required>
                            </div>
                            <div class="form-group">

                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <div class="app-checkbox">
                                            <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} > Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-6">
                                        <button type="submit" class="btn btn-success btn-block">Sign In</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="app-login-box-or">
                        <div class="or">OR</div>
                    </div>
                    <div class="app-login-box-container">
                        <button class="btn btn-facebook btn-block">Connect With Facebook</button>
                        <button class="btn btn-twitter btn-block">Connect With Twitter</button>
                    </div>
                    <div class="app-login-box-footer">
                        &copy; Boooya 2016. All rights reserved.
                    </div>
                </div>

            </div>
            <!-- END APP CONTAINER -->

        </div>
        <!-- END APP WRAPPER -->


        <!-- IMPORTANT SCRIPTS -->
        <script type="text/javascript" src="{{asset('Backend/js/vendor/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('Backend/js/vendor/jquery/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('Backend/js/vendor/bootstrap/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('Backend/js/vendor/moment/moment.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('Backend/js/vendor/customscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
        <!-- END IMPORTANT SCRIPTS -->
        <!-- THIS PAGE SCRIPTS -->
        <script type="text/javascript" src="{{asset('Backend/js/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.js')}}"></script>

        <script type="text/javascript" src="{{asset('Backend/js/vendor/jvectormap/jquery-jvectormap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('Backend/js/vendor/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
        <script type="text/javascript" src="{{asset('Backend/js/vendor/jvectormap/jquery-jvectormap-us-aea-en.js')}}"></script>

        <script type="text/javascript" src="{{asset('Backend/js/vendor/rickshaw/d3.v3.js')}}"></script>
        <script type="text/javascript" src="{{asset('Backend/js/vendor/rickshaw/rickshaw.min.js')}}"></script>
        <!-- END THIS PAGE SCRIPTS -->
        <script type="text/javascript" src="{{asset('Backend/js/vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('Backend/js/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>

        {{-- Date Pciker --}}
        <script type="text/javascript" src="{{asset('Backend/js/vendor/bootstrap-select/bootstrap-select.js')}}"></script>
        <script type="text/javascript" src="{{asset('Backend/js/vendor/select2/select2.full.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('Backend/js/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.js')}}"></script>
        <script type="text/javascript" src="{{asset('Backend/js/vendor/bootstrap-daterange/daterangepicker.js')}}"></script>
        <script type="text/javascript" src="{{asset('Backend/js/vendor/dropzone/dropzone.js')}}"></script>
        <script type="text/javascript" src="{{asset('Backend/js/vendor/cropper/cropper.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('Backend/js/vendor/form-validator/jquery.form-validator.min.js')}}"></script>

        <!-- APP SCRIPTS -->
        <script type="text/javascript" src="{{asset('Backend/js/main.js')}}"></script>
        <script type="text/javascript" src="{{asset('Backend/js/app.js')}}"></script>
        <script type="text/javascript" src="{{asset('Backend/js/app_plugins.js')}}"></script>
        <script type="text/javascript" src="{{asset('Backend/js/app_demo.js')}}"></script>
        <!-- END APP SCRIPTS -->
        <script type="text/javascript" src="{{asset('Backend/js/app_demo_dashboard.js')}}"></script>
        <script type="text/javascript" src="{{asset('Backend/js/vendor/form-validator/jquery.form-validator.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('Backend/js/vendor/sweetalert/sweetalert.min.js')}}"></script>
    </body>
</html>
