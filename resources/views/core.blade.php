<!DOCTYPE html>
<html>

        @include('header.logoheader')

    <body style="background-color:#F5F5F5;">

        @include('header.languagebar')
        @include('header.navbar')

        @yield('content', 'Display content')
        
    </body>

        @yield('extra_script')




</html>