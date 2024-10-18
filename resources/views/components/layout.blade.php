<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{!! asset('images/favicon.ico') !!}" type="image/x-icon">

    <title>{{ $metaTitle ?? 'Inicio' }} | Sindicato Libre Inscripciones'</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>

    @vite(['resources/css/bootstrap.min.css', 'resources/css/app.min.css', 'resources/css/icons.min.css', 'resources/css/flatpickr.min.css'])

    <!-- Scripts -->
    @vite(['resources/js/registros-listar.js'])

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.31/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

    <script src="./views/js/registros-listar.min.js?ver=fc50e2ba342d2abbc5455cb514c3962e"></script>
    <style>
        .close-jq-toast-single {
            top: -12px;
            right: -12px;
            font-size: 20px;
        }
    </style>

</head>

<body class="loading" data-layout-mode="detached">
    
    {{ $slot }}
    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <!-- Scripts -->
    @vite(['resources/js/app.min.js', 'resources/js/flatpickr.min.js'])


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>
</body>

</html>