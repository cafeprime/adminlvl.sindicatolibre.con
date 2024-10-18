
<!DOCTYPE html>
<html lang="es">
<head>
		<meta charset="UTF-8">
	<meta name="robots" content="noindex">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <title>Acceso | Sindicato Libre Inscripciones</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <!-- CSS -->

	@vite([
        'resources/css/bootstrap.min.css',
        'resources/css/app.min.css',
        'resources/css/app-dark.min.css',
        'resources/css/icons.min.css',
        'resources/css/estilos.css',
        ])
    <!-- Scripts -->
    @vite([
    'resources/js/login.min.js'
    ])    
    
</head>
<body class="loading authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-md-8 col-lg-6 col-xl-5">

                    <div class="card bg-pattern">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <div class="auth-logo">
                                        <span class="logo-lg">
                                            <img src="{!! asset('images/logo-dark.png') !!}" alt="Sindicato Libre" width="80">
                                        </span>
                                </div>
                                <p class="text-muted mb-4 mt-3">Introduzca usuario y contraseña para acceder al panel de administración.</p>
                            </div>
                            @if (session('desac') == 1)
                                <div class="sign-login alert alert-danger">Usuario desactivado</div>
                            @endif
                            <div class="ocultar sign-login alert alert-danger basealert"></div>
                            <form action="" method="POST" id="login-form">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="usuario">Usuario</label>
                                    <input class="form-control" id="usuario" name="usuario" placeholder="Introduzca usuario" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Introduzca password" required>
                                        <div class="input-group-append" data-password="false">
                                            <div class="input-group-text">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" type="submit" id="btn_acceso"> Iniciar sesión </button>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
   
    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <!-- Scripts -->
    @vite([
        'resources/js/app.min.js'
    ])

</body>

</html>
