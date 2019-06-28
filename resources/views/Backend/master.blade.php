@include('Backend.partials.header')
@include('Backend.partials.sidebar')


<div class="app-content app-sidebar-left">
    <!-- START APP HEADER -->
@include('Backend.partials.top-nav')
    <!-- END APP HEADER  -->

    <!-- START PAGE HEADING -->
{{-- @include('Backend.partials.heading') --}}
    <!-- END PAGE HEADING -->

    <!-- START PAGE CONTAINER -->
    <div class="container">

@yield('content')

    </div>
    <!-- END PAGE CONTAINER -->

</div>





@include('Backend.partials.footer')
