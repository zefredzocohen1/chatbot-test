<header class="header fixed-top clearfix">
    <!--logo start-->
    <div class="brand">
        <a href="{!! URL::to('/') !!}" class="logo">
            <div class="admin-header-title">
                <img src="{{ asset('images/logo-mini2.png') }}" width="180px"/>
            </div>
        </a>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars">
            </div>
        </div>
    </div>
    <!--logo end-->
    <div class="top-nav clearfix">
        <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a href="{{ url('account/edit')}}"><span>{{{ Auth::user()->email }}}</span></a>
            </li>
            <!-- user login dropdown end -->
        </ul>
    </div>


</header>