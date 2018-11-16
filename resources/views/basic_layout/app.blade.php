<!DOCTYPE html>
<html>
<head>
    @include('basic_layout.parts.head')
    @yield('additional_dependencies')
</head>
<body>
<div class="wrapper-container">
    @include('basic_layout.parts.header')
    <main class="content">
        @include('basic_layout.parts.sideNav')
        @yield('content')

    </main>
    @include('basic_layout.parts.footer')
</div>
@include('basic_layout.parts.scripts')
</body>
</html>
