<nav class="navbar navbar-default" style="border-radius:0;">
  <div class="container-fluid" style="background-color:white;">
   
    <div class="col-md-12">
      <ul class="nav navbar-nav">
        <li class="tabbutton @yield('activedash')"><a href="{{ URL::to('/dashboard') }}">{{ trans('menu.dashboard') }}</a></li>
        <li class="tabbutton @yield('activemember')" style="margin-left:5px;"><a href="{{ URL::to('/membermanagement') }}">{{ trans('menu.member') }}</a></li>
        <li class="tabbutton @yield('activegroup')" style="margin-left:5px;"><a href="{{ URL::to('/groupmanagement') }}">{{ trans('menu.group') }}</a></li>
        {{--  <li class="tabbutton @yield('activehistory')" style="margin-left:5px;"><a href="#">{{ trans('menu.history') }}</a></li>  --}}
        <li class="tabbutton @yield('activeblacklist')" style="margin-left:5px;"><a href="{{ URL::to('/blacklist') }}">BLACK LIST</a><li>
      </ul>
    </div>

  </div>
</nav>