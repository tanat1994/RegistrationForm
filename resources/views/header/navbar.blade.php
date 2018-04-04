<nav class="navbar navbar-default" style="border-radius:0;">
  <div class="container-fluid" style="background-color:white;">
   
    <div class="col-md-12">
      <ul class="nav navbar-nav">
        <li class="tabbutton @yield('activedash')"><a href="{{ URL::to('/dashboard') }}">{{ trans('menu.dashboard') }}</a></li>
        <li class="tabbutton @yield('activemember')" style="margin-left:5px;"><a href="{{ URL::to('/membermanagement') }}">{{ trans('menu.member') }}</a></li>
        <li class="tabbutton @yield('active_visitor')" style="margin-left:5px;"><a href="{{ URL::to('/visitormanagement') }}">{{ trans('menu.visitormanagement') }}</a></li>
        <li class="tabbutton @yield('activegroup')" style="margin-left:5px;"><a href="{{ URL::to('/groupmanagement') }}">{{ trans('menu.group') }}</a></li>
        {{--  <li class="tabbutton @yield('activehistory')" style="margin-left:5px;"><a href="#">{{ trans('menu.history') }}</a></li>  --}}
        <li class="tabbutton @yield('activeblacklist')" style="margin-left:5px;"><a href="{{ URL::to('/blacklist') }}">{{ trans('menu.blacklist') }}</a><li>
        <li class="tabbutton @yield('activecardmanagement')" style="margin-left:5px;"><a href="{{ URL::to('/cardmanagement') }}">{{ trans('menu.cardmanagement') }}</a><li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="pull-right" style="float:right"><a href="{{ URL::to('/logout') }}">LOGOUT</a></li>
      </ul>
    </div>

  </div>
</nav>