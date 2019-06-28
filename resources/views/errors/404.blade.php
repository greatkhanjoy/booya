<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Boooya - 404 Not found</title>

        <!-- META SECTION -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="{!! asset('Backend/favicon.ico') !!}" type="image/x-icon">
        <!-- END META SECTION -->
        <!-- CSS INCLUDE -->
        <link rel="stylesheet" href="{!! asset('Backend/css/styles.css') !!} ">
        <link rel="stylesheet" href="{!! asset('Backend/css/custom.css') !!} ">
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>

        <!-- APP WRAPPER -->
        <div class="app app-fh">

            <!-- START APP CONTAINER -->
            <div class="app-container" style="background: url({!! asset('Backend/assets/images/background/bg-1.jpg')!!}) center center no-repeat fixed;">

                <div class="app-lock">

                    <div class="notfound-text">
                        <h1>404</h1>
                        <h3>Page not found!</h3>
                    </div>


                </div>

            </div>
            <!-- END APP CONTAINER -->

        </div>
        <!-- END APP WRAPPER -->

        <!-- IMPORTANT SCRIPTS -->
        <script type="text/javascript" src="{!! asset('Backend/js/vendor/jquery/jquery.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('Backend/js/vendor/jquery/jquery-ui.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('Backend/js/vendor/bootstrap/bootstrap.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('Backend/js/vendor/moment/moment.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('Backend/js/vendor/customscrollbar/jquery.mCustomScrollbar.min.js') !!}"></script>
        <!-- END IMPORTANT SCRIPTS -->
        <!-- APP SCRIPTS -->
        <script type="text/javascript" src="{!! asset('Backend/js/app.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('Backend/js/app_plugins.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('Backend/js/app_demo.js') !!}"></script>
        <!-- END APP SCRIPTS -->
    </body>
</html>
