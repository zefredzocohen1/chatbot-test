<header class="header fixed-top clearfix">
    <!--logo start-->
    <div class="brand">
        <a href="<?php echo URL::to('/'); ?>" class="logo">
            <div class="admin-header-title">
                <img src="<?php echo e(asset('images/logo-mini2.png')); ?>" width="180px"/>
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
                <a href="<?php echo e(url('account/edit')); ?>"><span><?php echo e(Auth::user()->email); ?></span></a>
            </li>
            <!-- user login dropdown end -->
        </ul>
    </div>


</header>