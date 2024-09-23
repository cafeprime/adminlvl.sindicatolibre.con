
<!DOCTYPE html>
<html lang="es">
<head>
		<meta charset="UTF-8">
	<meta name="robots" content="noindex">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <!-- Scripts -->
	@vite(['resources/js/jquery-3.7.1.min.js'])

    <title>Acceso | Sindicato Libre Inscripciones</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./views/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
	<link href="./views/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
    
	<link href="./views/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
	<link href="./views/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
	<link href="./views/css/estilos.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
    
	<!-- icons -->
	<link href="./views/css/icons.min.css" rel="stylesheet" type="text/css" />
    <script src="./views/js/login.min.js?ver=a50a6113f88f4835cba0ba713ca5447d"></script>
    
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
                                            <img src="./views/images/logo-dark.png" alt="Sindicato Libre" width="80">
                                        </span>
                                </div>
                                <p class="text-muted mb-4 mt-3">Introduzca usuario y contraseña para acceder al panel de administración.</p>
                            </div>
                            <div class="ocultar sign-login alert alert-danger"></div>
                            <form action="" method="POST" id="login-form">

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

    <!-- Vendor js -->
    <script src="./views/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="./views/js/app.min.js"></script>
   

</body>

</html>
