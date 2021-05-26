<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.includes.head')
    </head>
    <body class="sb-nav-fixed">
        @include('admin.includes.nav')
        <div id="layoutSidenav">
        @include('admin.includes.sidebar')
            <div id="layoutSidenav_content">
                @yield('xyz')
                @include('admin.includes.footer')
            </div>
        </div>
        @include('admin.includes.scripts')
        @yield('scripts')
    </body>
</html>
