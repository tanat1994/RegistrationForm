<!DOCTYPE html>
<html>

        @include('header.logoheader')

    <body @yield('body_function', 'JSonBody')>

        @include('header.languagebar')
        @include('header.navbar')

        @yield('content', 'Display content')
        
    </body>

        @yield('extra_script')




</html>