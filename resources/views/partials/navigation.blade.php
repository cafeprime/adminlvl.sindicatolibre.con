<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ session("foto") }}" alt="user-img" class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-toggle="dropdown"><i data-feather="power" class="icon-dual" style="width:15px;"></i>
                    {{ session("nombre") }}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <a href="cambiar-password" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>Cambiar contraseña</span>
                    </a>

                    <a href="logout" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>Desconectar</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">{{ session("rol") }} </p>
            <a href="/registros-listar" style="color:#b2bcc2;"><i data-feather="home" class="icon-dual"
                    style="width:15px;vertical-align:bottom"></i> Inicio</a>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul id="side-menu">
                <!-- Opción para todos los roles -->
                @php
                    $role = session('rol');
                @endphp

                @if(in_array($role, ['Superadmin', 'Administrador', 'Admincursos', 'Adminplan2']))
                        <li class="menu-title"></li>
                        <li class="menu-title">Registros</li>
                        <li><a href="{{ route('registros.listar') }}"><i data-feather="list" class="icon-dual"></i><span> Listar registros </span></a></li>
                        @if(in_array($role, ['Superadmin', 'Administrador']))
                            <li><a href="{{ route('registros.crear') }}"><i data-feather="edit-2" class="icon-dual"></i><span> Crear registro </span></a></li>
                        @endif
                        <li><a href="{{ route('registros.modificados') }}"><i data-feather="repeat" class="icon-dual"></i><span> Listar modificados </span></a></li>
                        @if(in_array($role, ['Superadmin', 'Admincursos', 'Adminplan2']))
                            <li><a href="{{ route('registros.eliminados') }}"><i data-feather="trash-2" class="icon-dual"></i><span> Listar eliminados </span></a></li>
                        @endif
                        <!-- Opciones adicionales solo para Superadmin -->
                        @if($role === 'Superadmin')
                            <li class="menu-title"></li>
                            <li class="menu-title">Administradores</li>
                            <li><a href="{{ route('administradores.listar') }}"><i data-feather="users" class="icon-dual"></i><span> Listar administradores </span></a></li>
                            <li><a href="administradores-crear"><i data-feather="user-plus" class="icon-dual"></i><span>
                                        Crear administrador </span></a></li>
                        @endif
        
                        @if($role === 'Superadmin')
                            <li class="menu-title"></li>
                            <li class="menu-title">Configuración</li>
                            <li><a href="{{ route('opciones') }}"><i data-feather="sliders" class="icon-dual"></i><span> Opciones </span></a></li>                        
                            <!-- Añadir aquí más opciones si es necesario -->
                        @endif
                    </ul>
                @endif
    

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>