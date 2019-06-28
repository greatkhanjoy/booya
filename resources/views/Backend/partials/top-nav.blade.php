<div class="app-header">
    <ul class="app-header-buttons">
        <li class="visible-mobile"><a href="#" class="btn btn-link btn-icon" data-sidebar-toggle=".app-sidebar.dir-left"><span class="icon-menu"></span></a></li>
        <li class="hidden-mobile"><a href="#" class="btn btn-link btn-icon" data-sidebar-minimize=".app-sidebar.dir-left"><span class="icon-menu"></span></a></li>
    </ul>
    <form class="app-header-search" action="" method="post">
        <input type="text" name="keyword" placeholder="Search">
    </form>

    <ul class="app-header-buttons pull-right">
        <li>
            <div class="contact contact-rounded contact-bordered contact-lg contact-ps-controls">
                <img src="{!! asset('Backend/img/uploads/'.Auth::user()->photo) !!}" alt="{{ Auth::user()->name }}">
                <div class="contact-container">

                    <a href="#">{{ Auth::user()->name }}</a>
                    <span>Howdy!</span>

                </div>
                <div class="contact-controls">
                    <div class="dropdown">
                        <button type="button" class="btn btn-default btn-icon" data-toggle="dropdown"><span class="icon-cog"></span></button>
                        <ul class="dropdown-menu dropdown-left">
                            <li><a href="{!! route('User') !!}"><span class="icon-cog"></span> Profile</a></li>
                            <li><a href="#"><span class="icon-envelope"></span> Messages <span class="label label-danger pull-right">+24</span></a></li>
                            <li><a href="#"><span class="icon-users"></span> Contacts <span class="label label-default pull-right">76</span></a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();" ><span class="icon-exit"></span> Log Out</a>
                            </li>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 {{ csrf_field() }}
                             </form>
                        </ul>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>
