<!DOCTYPE html>
<html lang="en" class="dark scroll-smooth group" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg"
    data-mode="dark" data-topbar="dark" data-skin="default" data-navbar="sticky" data-content="fluid" dir="ltr">



<head>

    <meta charset="utf-8">
    <title>Sign In | DialDeck</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="DialDeck by Evoton" name="description">
    <meta content="Evoton DialDeck" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <!-- Icons CSS -->

    <!-- Tailwind CSS -->


    <link rel="stylesheet" href="{{ asset('assets/css/tailwind2.css') }}">
</head>

<body
    class="flex items-center justify-center min-h-screen py-16 bg-cover bg-auth-pattern dark:bg-auth-pattern-dark dark:text-zink-100 font-public">

    @yield('content')

    <script src='{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}'></script>
    <script src="{{ asset('assets/libs/%40popperjs/core/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/tippy.js/tippy-bundle.umd.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets/libs/lucide/umd/lucide.js') }}"></script>
    <script src="{{ asset('assets/js/DialDeck.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/pages/auth-login.init.js') }}"></script>

</body>

</html>
