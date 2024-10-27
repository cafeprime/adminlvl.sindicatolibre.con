<x-layout meta-title="Listar registros" meta-description="Listado de registros de alumnos por provincias">
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
                                                    <input type="search" class="form-control" id="txtbusca"
                                                        placeholder="Buscar..." maxlength="80">
                                                </div>

                                                <div class="form-group col-lg-3">
                                                    <select class="form-control" id="provincia" name="provincia">
                                                        <option value="0">Todas las provincias</option>
                                                        @foreach ($provincias as $provincia)
                                                            <option value="{{ $provincia->IDPROVINCIA }}">{{ $provincia->PROVINCIA }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <select class="form-control" id="tipo_registro"
                                                        name="tipo_registro">
                                                        <option value="0">Todos</option>
                                                        <option value="1">Activos</option>
                                                        <option value="2">Eliminados</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        @if (session('rol') == 'Superadmin' || session('rol') == 'Administrador')
                                            <div class="col-xl-4 col-lg-5 col-md-6">
                                                <a class="btn btn-success btn-rounded waves-effect waves-light"
                                                    data-toggle="modal" data-target="#importar" href="#"
                                                    style="float:right;margin-left:10px;margin-bottom:10px;"><span
                                                        class="btn-label"><i class="mdi mdi-file-excel"></i></span>
                                                    Carga
                                                    Excel</a>
                                                <a class="btn btn-success btn-rounded waves-effect waves-light"
                                                    data-toggle="modal" data-target="#informes" href="#"
                                                    style="float:right;"><span class="btn-label"><i
                                                            class="mdi mdi-file-excel"></i></span> Generar informe</a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-12 table-responsive">
                                            <table data-toggle="table"
                                                class="table-bordered table table-hover"style="display: table;">
                                                <thead class="thead-light">
                                                    <tr>
                                                        @if (session('rol') == 'Superadmin' || session('rol') == 'Administrador')
                                                            <th class="bs-checkbox " style="width: 36px;">
                                                                <div class="th-inner "><label><input name="selectAll"
                                                                            type="checkbox"
                                                                            class="selectAll"><span></span></label>
                                                                </div>
                                                            </th>
                                                        @endif
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
                                                            @if (session('rol') == 'Superadmin' || session('rol') == 'Administrador')
                                                                <td class="bs-checkbox" style="width:36px;"><input type="checkbox" class="delCheck" value="{{ $registro->IDREGISTRO }}"></td>
                                                            @endif
                                                            <td>{{ $registro->NOMBRE . ' ' . $registro->APELLIDO1 . ' ' . $registro->APELLIDO2 }}</td>
                                                            <td>{{ $registro->DNI . $registro->DNI_LETRA }}</td>
                                                            <td><a href="mailto:{{ $registro->EMAIL }}"><small>{{ $registro->EMAIL }}</small></a><br><x-icono-telefono></x-icono-telefono>{{ $registro->TELEFONO }}</td>
                                                            <td>VALENCIA</td>
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
            @if (session('rol') == 'Superadmin' || session('rol') == 'Administrador')
                <div class="modal fade" id="informes" tabindex="-1" role="dialog" aria-labelledby="Informes"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Generar informe: Filtros</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="#" method="post" id="informes_form">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label><strong>Rango fechas</strong></label>
                                                <input type="text" id="rango-fechas" name="rango-fechas"
                                                    value="" class="form-control flatpickr-input active"
                                                    placeholder="Seleccionar fechas" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label><strong>Provincia</strong></label>
                                                <select class="form-control" id="provincia_inf" name="provincia_inf">
                                                    <option value="0">Todas las provincias</option>
                                                    @foreach ($provincias as $provincia)
                                                        <option value="{{ $provincia->IDPROVINCIA }}">
                                                            {{ $provincia->PROVINCIA }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @if (session('rol') == 'Superadmin')
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="checkbox mb-2">
                                                        <input id="eliminados" name="eliminados" type="checkbox">
                                                        <label for="eliminados">Sólo eliminados</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if (session('rol') == 'Superadmin' || session('rol') == 'Administrador')
                                        <div class="row">
                                            <div class="col-12">
                                                <label><strong>Colectivo</strong></label>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <div class="checkbox mb-2">
                                                                <input id="fijo" name="fijo" type="checkbox">
                                                                <label for="fijo">Fijo</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <div class="checkbox mb-2">
                                                                <input id="eventual" name="eventual"
                                                                    type="checkbox">
                                                                <label for="eventual">Eventual</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <div class="checkbox mb-2">
                                                                <input id="libre" name="libre" type="checkbox">
                                                                <label for="libre">Libre</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if (session('rol') == 'Superadmin' || session('rol') == 'Administrador' || session('rol') == 'Adminplan2')
                                        <div class="row">
                                            <div class="col-12">
                                                <label><strong>Formación para la consolidación de
                                                        empleo</strong></label>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <div class="checkbox mb-2">
                                                                <input id="plan1" name="plan1" type="checkbox">
                                                                <label for="plan1">Plan 1</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <div class="checkbox mb-2">
                                                                <input id="plan2" name="plan2" type="checkbox">
                                                                <label for="plan2">Plan 2</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label><strong>Formación para el personal fijo</strong></label>
                                                <label>Formación aspirantes a sustituciones de jefaturas</label>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <div class="checkbox mb-2">
                                                                <input id="fasj_productos" name="fasj_productos"
                                                                    type="checkbox">
                                                                <label for="fasj_productos">Productos y
                                                                    servicios</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <div class="checkbox mb-2">
                                                                <input id="fasj_distribucion" name="fasj_distribucion"
                                                                    type="checkbox">
                                                                <label for="fasj_distribucion">Distribución</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <div class="checkbox mb-2">
                                                                <input id="fasj_centros" name="fasj_centros"
                                                                    type="checkbox">
                                                                <label for="fasj_centros">Centros</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Formación aspirantes a jefes de equipo</label>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <div class="checkbox mb-2">
                                                                <input id="faje_productos" name="faje_productos"
                                                                    type="checkbox">
                                                                <label for="faje_productos">Productos y
                                                                    servicios</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <div class="checkbox mb-2">
                                                                <input id="faje_distribucion" name="faje_distribucion"
                                                                    type="checkbox">
                                                                <label for="faje_distribucion">Distribución</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <div class="checkbox mb-2">
                                                                <input id="faje_centros" name="faje_centros"
                                                                    type="checkbox">
                                                                <label for="faje_centros">Centros</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if (session('rol') == 'Superadmin' || session('rol') == 'Administrador' || session('rol') == 'Admincursos')
                                        <div class="row">
                                            <div class="col-12">
                                                <label><strong>Cursos</strong></label>
                                                <div class="row">
                                                    @foreach ($cursos as $curso)
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="checkbox mb-2">
                                                                    <input id="curso_{{ $curso->IDCURSO }}"
                                                                        name="cursos[]" value="{{ $curso->IDCURSO }}"
                                                                        type="checkbox">
                                                                    <label
                                                                        for="curso_{{ $curso->IDCURSO }}">{{ $curso->CURSO }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Generar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="importar" tabindex="-1" role="dialog" aria-labelledby="Importar"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Carga masiva de registros</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="#" method="post" id="submit_excel" name="submit_excel"
                                enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <input type="file" class="form-control-file" id="excel_file"
                                                    name="excel_file" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="/generar-base" target="_blank">Plantilla creación</a>
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" id="env_btn">Importar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('rol') == 'Superadmin')
                <div class="modal fade" id="recuperarModal" tabindex="-1" role="dialog"
                    aria-labelledby="recuperarModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="recuperarModalLabel">Recuperar registro</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Va a proceder a la recuperación de un registro. ¿Desea continuar?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Cancelar</button>
                                <!-- Botón de confirmación con el ID confirmRecuperarBtn -->
                                <button type="button" class="btn btn-primary"
                                    id="confirmRecuperarBtn">Recuperar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @include('partials.footer')

        </div>

    </div>

    <div style="position: fixed; top: 80px; right: 10px; z-index:1000" id="toasts"></div>
</x-layout>
