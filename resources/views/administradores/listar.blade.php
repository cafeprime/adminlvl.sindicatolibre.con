<x-layout meta-title="Listar registros" meta-description="Listado de registros de alumnos por provincias">
    {{-- SCRIPTS --}}
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
                                <h4 class="page-title">Listar Registros</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-xl-8 col-lg-7 col-md-6">
                                            <div class="row mb-2">
                                                <div class="form-group col-lg-4">
                                                    <input type="search" class="form-control" id="txtbusca" placeholder="Buscar..." maxlength="80">
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-12 table-responsive">
                                            <table data-toggle="table"
                                                class="table-bordered table table-hover"style="display: table;">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th class="bs-checkbox " style="width: 36px;">
                                                            <div class="th-inner "><label><input name="selectAll"
                                                                        type="checkbox"
                                                                        class="selectAll"><span></span></label>
                                                            </div>
                                                        </th>                                                        
                                                        <th>
                                                            <div class="th-inner ">Nombre y apellidos</div>
                                                        </th>
                                                        <th>
                                                            <div class="th-inner ">DNI</div>
                                                        </th>
                                                        <th>
                                                            <div class="th-inner ">EMAIL / TELÉFONO</div>
                                                        </th>
                                                        <th>
                                                            <div class="th-inner ">Provincia</div>
                                                        </th>
                                                        <th>
                                                            <div class="th-inner ">Fechas</div>
                                                        </th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="b_regs_buscador"></tbody>
                                                <tbody id="b_regs">
                                                    <tr>
                                                        <td colspan="7">Hay {{ $totalRegistros }} registro/s</td>
                                                    </tr>
                                                    @foreach ($registros as $registro)
                                                        <tr>
                                                            <td class="bs-checkbox" style="width:36px;"><input type="checkbox" class="delCheck" value="{{ $registro->IDREGISTRO }}"></td>
                                                            <td>{{ $registro->NOMBRE . ' ' . $registro->APELLIDO1 . ' ' . $registro->APELLIDO2 }}</td>
                                                            <td>{{ $registro->DNI . $registro->DNI_LETRA }}</td>
                                                            <td><a href="mailto:{{ $registro->EMAIL }}"><small>{{ $registro->EMAIL }}</small></a><br><x-icono-telefono></x-icono-telefono>{{ $registro->TELEFONO }}</td>
                                                            <td>{{ $registro->PROVINCIA }}</td>
                                                            <td>{{ $registro->FECHA_INSCRIPCION }}<br></td>
                                                            <td><a href="/registros-modificar/{{ $registro->IDREGISTRO }}"><x-icono-modificar></x-icono-modificar></a></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <button class="form-control btn btn-danger waves-effect waves-light"
                                                id="deleteButton" disabled>Eliminar</button>
                                        </div>
                                        <div class="col-lg-10">

                                            {{-- Con esto cambiamos la varible por defecto page a p tal como tenía en mi App antigua. Si guiero usar lo nuevo pongo sólo $registros->links() --}}
                                            {{-- Como Quería cmabiar los estilos de las páginas adaptándolas al antiguo diseño hice esto en el terminal: "php artisan vendor:publish --tag=laravel-pagination" que me compió la lógica de la paginación de bootstrap en resources/vendor/pagination y ahí pude retocar la página boostrap-4.blade.php --}}
                                            {!! str_replace('page=', 'p=', $registros->links()) !!}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- container -->

            </div> <!-- content -->

            @include('partials.footer')

        </div>

    </div>

    <div style="position: fixed; top: 80px; right: 10px; z-index:1000" id="toasts"></div>
</x-layout>
