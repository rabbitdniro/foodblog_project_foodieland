<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
</head>

<body>
    <header>
        @include('components.header')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @include('components.footer')
    </footer>
</body>

</html>