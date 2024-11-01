<x-layout meta-title="Listar registros" meta-description="Listado de registros de alumnos por provincias">

    <x-slot name="jsextras">@vite(['resources/js/registros-listar.js'])</x-slot>
    <!-- Begin page -->
    <div id="wrapper">
    
        <!-- Topbar Start -->        
        @include('partials.topbar')
        <!-- end Topbar -->
    
        <!-- Left Sidebar Start -->
        @include('partials.navigation')
        <!-- end Left Sidebar -->
    
        <div class="content-page">
            
            <div class="content">
                <!-- COMPONENTE ALERT FUNCIONAL, SOLO HAY QUE DARLE ESTILOS DEL TEMA -->
                    {{-- <x-alert type="alert" class="mb-4">
                        <x-slot name="title">
                            Título de la alerta
                        </x-slot>
                        Contenido de la alerta
                    </x-alert> --}}
                <!-- Start Content-->
                <div class="container-fluid">
    
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Cambiar Password</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
    
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="POST" id="formModPass">                                 
                                        <div class="row"> 
                                            <div class="col-lg-3">
                                                <div class="form-group mb-0">
                                                    <label for="password_ant">Contraseña antigua:</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="password" id="password_ant" name="password_ant" class="form-control" maxlength="15" required="">
                                                        <div class="input-group-append" data-password="false">
                                                            <div class="input-group-text">
                                                                <span class="password-eye"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group mb-0">
                                                    <label for="password">Contraseña nueva (8 car. min):</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="password" id="password" name="password" class="form-control" maxlength="15" required="">
                                                        <div class="input-group-append" data-password="false">
                                                            <div class="input-group-text">
                                                                <span class="password-eye"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group mb-0">
                                                    <label for="reppassword">Repita contraseña nueva:</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="password" id="reppassword" name="reppassword" class="form-control" maxlength="15" required="">
                                                        <div class="input-group-append" data-password="false">
                                                            <div class="input-group-text">
                                                                <span class="password-eye"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                        
                                            <div class="col-lg-12 mb-3 mt-0">
                                                <small>Sólo se permiten letras, números y los caracteres -_+.</small>
                                            </div>                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <button type="submit" class="btn btn-info waves-effect waves-light">Modificar contraseña</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> 
                        </div> 
                    </div>
    
                </div> <!-- container -->
    
            @include('partials.footer')
    
        </div>
    
    </div>
    
    <div style="position: fixed; top: 80px; right: 10px; z-index:1000" id="toasts"></div>
</x-layout>





