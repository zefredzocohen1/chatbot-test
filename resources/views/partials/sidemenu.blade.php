<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation" tabindex="5000" style="overflow: hidden; outline: none;">
            <ul class="sidebar-menu" id="nav-accordion">
                @if(Auth::user()->authority == $authority['admin'])
                    <li>
                        <a href="{!! URL::to('user') !!}" class="{{ Request::is('user') ? 'active' : '' }}">
                            <i class="fa fa-users"></i> <span>{{{ trans('menu.user_list') }}}</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{!! URL::to('dashboard/'.config('constants.service.facebook')) !!}" class="{{ Request::is('dashboard') ? 'active' : '' }}">
                            <i class="fa fa-book"></i> <span>{{{ trans('menu.dashboard') }}}</span>
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{!! URL::to('account/edit') !!}" class="{{ Request::is('account/edit') ? 'active' : '' }}"><i class="fa fa-cog text-warning"></i> <span>{{{ trans('menu.setting') }}}</span></a>
                </li>

                <li>
                    <a href="{!! URL::to('logout') !!}"><i class="fa fa-sign-out text-danger"></i> <span>{{{ trans('menu.sd_logout') }}}</span></a>
                </li>
            </ul></div>
        <!-- sidebar menu end-->
        <div id="ascrail2000" class="nicescroll-rails" style="width: 3px; z-index: auto; cursor: default; position: absolute; top: 0px; left: 237px; height: 253px; opacity: 0; display: block;"><div style="position: relative; top: 0px; float: right; width: 3px; height: 62px; border: 0px solid rgb(255, 255, 255); border-radius: 0px; background-color: rgb(31, 181, 173); background-clip: padding-box;"></div></div><div id="ascrail2000-hr" class="nicescroll-rails" style="height: 3px; z-index: auto; top: 250px; left: 0px; position: absolute; cursor: default; display: none; width: 237px; opacity: 0;"><div style="position: relative; top: 0px; height: 3px; width: 240px; border: 0px solid rgb(255, 255, 255); border-radius: 0px; background-color: rgb(31, 181, 173); background-clip: padding-box;"></div></div></div>
</aside>


