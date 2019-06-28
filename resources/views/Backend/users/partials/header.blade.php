<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Boooya - Bank - Security</title>

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
        <div class="app">

            <!-- START APP CONTAINER -->
            <div class="app-container">
                <!-- START APP HEADER -->
                <div class="app-header">
                    <div class="container container-boxed">
                        <ul class="app-header-buttons visible-mobile">
                            <li><a href="#" class="btn btn-link btn-icon" data-navigation-horizontal-toggle="true"><span class="icon-menu"></span></a></li>
                        </ul>

                        <ul class="app-header-buttons pull-right">
                            @if ($user->user_level == 2)
                              <li><a href="{!! route('Dashboard') !!}" class="btn btn-link btn-icon"><span class="icon-cog"></span></a></li>
                            @endif
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"  class="btn btn-default">Log Out</a></li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
                <!-- END APP HEADER  -->

                <!-- START APP CONTENT -->
                <div class="app-content">
                    <div class="app-navigation-horizontal margin-bottom-15">
                        <div class="container container-boxed">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="{!! route('User') !!}"><span class="icon-earth"></span> My Account</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
