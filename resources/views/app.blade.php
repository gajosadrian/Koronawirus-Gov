<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="16x16" type="image/png" href="{{ asset('favicons/favicon-16x16.png') }}">
    <link rel="icon" sizes="32x32" type="image/png" href="{{ asset('favicons/favicon-32x32.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('favicons/android-chrome-192x192.png') }}">
    <link rel="icon" sizes="512x512" type="image/png" href="{{ asset('favicons/android-chrome-512x512.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png') }}">

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    {{-- Inertia --}}
    <script src="https://polyfill.io/v3/polyfill.min.js?features=smoothscroll,NodeList.prototype.forEach,Promise,Object.values,Object.assign" defer></script>

    <script src="{{ mix('/js/app.js') }}" defer></script>
    @routes
</head>
<body>

@inertia

</body>
</html>
