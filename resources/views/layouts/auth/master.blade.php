<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.admin._meta')
    @include('layouts.auth._style')
</head>

<body id="page-top">

        @yield('content')
    @include('layouts.auth._script')
    @yield('js')
</body>

</html>

