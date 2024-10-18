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
                                                        <option value="1">ALAVA</option>
                                                        <option value="2">ALBACETE</option>
                                                        <option value="3">ALICANTE</option>
                                                        <option value="4">ALMERIA</option>
                                                        <option value="5">ASTURIAS</option>
                                                        <option value="6">AVILA</option>
                                                        <option value="7">BADAJOZ</option>
                                                        <option value="8">BARCELONA</option>
                                                        <option value="9">BURGOS</option>
                                                        <option value="10">CACERES</option>
                                                        <option value="11">CADIZ</option>
                                                        <option value="12">CANTABRIA</option>
                                                        <option value="13">CASTELLON</option>
                                                        <option value="14">CIUDAD REAL</option>
                                                        <option value="15">CORDOBA</option>
                                                        <option value="16">CUENCA</option>
                                                        <option value="17">GERONA</option>
                                                        <option value="18">GRANADA</option>
                                                        <option value="19">GUADALAJARA</option>
                                                        <option value="20">GUIPUZCOA</option>
                                                        <option value="21">HUELVA</option>
                                                        <option value="22">HUESCA</option>
                                                        <option value="23">ISLAS BALEARES</option>
                                                        <option value="24">JAEN</option>
                                                        <option value="25">LA CORUNA</option>
                                                        <option value="26">LA RIOJA</option>
                                                        <option value="27">LAS PALMAS</option>
                                                        <option value="28">LEON</option>
                                                        <option value="29">LERIDA</option>
                                                        <option value="30">LUGO</option>
                                                        <option value="31">MADRID</option>
                                                        <option value="32">MALAGA</option>
                                                        <option value="33">MURCIA</option>
                                                        <option value="34">NAVARRA</option>
                                                        <option value="35">ORENSE</option>
                                                        <option value="36">PALENCIA</option>
                                                        <option value="37">PONTEVEDRA</option>
                                                        <option value="38">SALAMANCA</option>
                                                        <option value="39">SANTA CRUZ DE TENERIFE</option>
                                                        <option value="40">SEGOVIA</option>
                                                        <option value="41">SEVILLA</option>
                                                        <option value="42">SORIA</option>
                                                        <option value="43">TARRAGONA</option>
                                                        <option value="44">TERUEL</option>
                                                        <option value="45">TOLEDO</option>
                                                        <option value="46">VALENCIA</option>
                                                        <option value="47">VALLADOLID</option>
                                                        <option value="48">VIZCAYA</option>
                                                        <option value="49">ZAMORA</option>
                                                        <option value="50">ZARAGOZA</option>
                                                        <option value="51">CEUTA</option>
                                                        <option value="52">MELILLA</option>
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
                                        <div class="col-xl-4 col-lg-5 col-md-6">
                                            <a class="btn btn-success btn-rounded waves-effect waves-light"
                                                data-toggle="modal" data-target="#importar" href="#"
                                                style="float:right;margin-left:10px;margin-bottom:10px;"><span
                                                    class="btn-label"><i class="mdi mdi-file-excel"></i></span> Carga
                                                Excel</a>
                                            <a class="btn btn-success btn-rounded waves-effect waves-light"
                                                data-toggle="modal" data-target="#informes" href="#"
                                                style="float:right;"><span class="btn-label"><i
                                                        class="mdi mdi-file-excel"></i></span> Generar informe</a>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-12 table-responsive">
                                            <table data-toggle="table" class="table-bordered table table-hover"
                                                style="display: table;">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th class="bs-checkbox " style="width: 36px;">
                                                            <div class="th-inner "><label><input name="selectAll"
                                                                        type="checkbox"
                                                                        class="selectAll"><span></span></label></div>
                                                            <div class="fht-cell"></div>
                                                        </th>
                                                        <th>
                                                            <div class="th-inner ">Nombre y apellidos</div>
                                                            <div class="fht-cell"></div>
                                                        </th>
                                                        <th>
                                                            <div class="th-inner ">DNI</div>
                                                            <div class="fht-cell"></div>
                                                        </th>
                                                        <th>
                                                            <div class="th-inner ">EMAIL / TELÉFONO</div>
                                                            <div class="fht-cell"></div>
                                                        </th>
                                                        <th>
                                                            <div class="th-inner ">Provincia</div>
                                                            <div class="fht-cell"></div>
                                                        </th>
                                                        <th>
                                                            <div class="th-inner ">Fechas</div>
                                                            <div class="fht-cell"></div>
                                                        </th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="b_regs_buscador"></tbody>
                                                <tbody id="b_regs">
                                                    <tr>
                                                        <td colspan="7">Hay
                                                            483 registro/s
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="483"></td>
                                                        <td>MARIA ANGELES TORRES TORRES</td>
                                                        <td>48406116V</td>
                                                        <td><a
                                                                href="mailto:mariangelestorres0@gmail.com"><small>mariangelestorres0@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>642099812</td>
                                                        <td>VALENCIA</td>
                                                        <td>02-10-2024 12:19:14<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=483"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="482"></td>
                                                        <td>MARCO BARRACHINA CAMBRA</td>
                                                        <td>48586948T</td>
                                                        <td><a
                                                                href="mailto:mbarrachina22@gmail.com"><small>mbarrachina22@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>667246979</td>
                                                        <td>VALENCIA</td>
                                                        <td>02-10-2024 12:19:14<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=482"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="481"></td>
                                                        <td>ISABEL FERNANDEZ GONZALEZ</td>
                                                        <td>02228421C</td>
                                                        <td><a
                                                                href="mailto:isabelfg04@hotmail.com"><small>isabelfg04@hotmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>686298506</td>
                                                        <td>MADRID</td>
                                                        <td>30-09-2024 14:15:16<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=481"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="480"></td>
                                                        <td>MARIA GOMEZ RILO</td>
                                                        <td>45954263X</td>
                                                        <td><a
                                                                href="mailto:mariagomez2992@gmail.com"><small>mariagomez2992@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>638339464</td>
                                                        <td>LA CORUNA</td>
                                                        <td>27-09-2024 11:30:47<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=480"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="479"></td>
                                                        <td>CRISTINA LOPEZ GOMEZ</td>
                                                        <td>44877381B</td>
                                                        <td><a
                                                                href="mailto:negronera1983@gmail.com"><small>negronera1983@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>661426798</td>
                                                        <td>VALENCIA</td>
                                                        <td>24-09-2024 09:46:38<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=479"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="478"></td>
                                                        <td>NATALIA STEENHAUT BOJ</td>
                                                        <td>45903009T</td>
                                                        <td><a
                                                                href="mailto:2nataliaboj2@gmail.com"><small>2nataliaboj2@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>672110051</td>
                                                        <td>VALENCIA</td>
                                                        <td>24-09-2024 09:46:38<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=478"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="477"></td>
                                                        <td>MARIA DEL CARMEN ESCOBAR GIL</td>
                                                        <td>44802198S</td>
                                                        <td><a
                                                                href="mailto:m.escobargil@gmail.com"><small>m.escobargil@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>667436355</td>
                                                        <td>VALENCIA</td>
                                                        <td>24-09-2024 09:46:38<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=477"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="476"></td>
                                                        <td>ROSA MARIA PANADERO MONTESINOS</td>
                                                        <td>07048013P</td>
                                                        <td><a
                                                                href="mailto:roxita40hd@gmail.com"><small>roxita40hd@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>649775370</td>
                                                        <td>BADAJOZ</td>
                                                        <td>23-09-2024 23:43:16<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=476"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="475"></td>
                                                        <td>MARIA GEMA FERNANDEZ ACOSTA</td>
                                                        <td>80049380L</td>
                                                        <td><a
                                                                href="mailto:gemafernandz@hotmail.com"><small>gemafernandz@hotmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>636530321</td>
                                                        <td>BADAJOZ</td>
                                                        <td>23-09-2024 23:39:08<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=475"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="474"></td>
                                                        <td>MANUEL QUINTANA HURTADO</td>
                                                        <td>08832955N</td>
                                                        <td><a
                                                                href="mailto:manuqui1969@gmail.com"><small>manuqui1969@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>695676147</td>
                                                        <td>BADAJOZ</td>
                                                        <td>22-09-2024 11:58:23<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=474"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="473"></td>
                                                        <td>MARIA FRANCISCA ABAD MOLINA</td>
                                                        <td>77514833A</td>
                                                        <td><a
                                                                href="mailto:mfranciscaabad@gmail.com"><small>mfranciscaabad@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>647484177</td>
                                                        <td>MURCIA</td>
                                                        <td>19-09-2024 08:01:15<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=473"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="472"></td>
                                                        <td>MARIA JESUS GUERRERO SANCHEZ</td>
                                                        <td>03105995Y</td>
                                                        <td><a
                                                                href="mailto:chusitauro@gmail.com"><small>chusitauro@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>619328429</td>
                                                        <td>MADRID</td>
                                                        <td>18-09-2024 16:49:17<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=472"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="471"></td>
                                                        <td>ALICIA MONJO JIMENEZ</td>
                                                        <td>80080735W</td>
                                                        <td><a
                                                                href="mailto:aliciamjz@hotmail.com"><small>aliciamjz@hotmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>676278805</td>
                                                        <td>BADAJOZ</td>
                                                        <td>18-09-2024 00:13:28<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=471"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="470"></td>
                                                        <td>JOSE ANTONIO GOMEZ HERNANDEZ</td>
                                                        <td>50461367B</td>
                                                        <td><a
                                                                href="mailto:jaghwww@gmail.com"><small>jaghwww@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>651882327</td>
                                                        <td>MADRID</td>
                                                        <td>13-09-2024 08:22:28<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=470"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="469"></td>
                                                        <td>MARIA ISABEL PATON GANAU</td>
                                                        <td>74394855K</td>
                                                        <td><a
                                                                href="mailto:mariaisabel_pganau@hotmail.com"><small>mariaisabel_pganau@hotmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>661320799</td>
                                                        <td>VALENCIA</td>
                                                        <td>09-09-2024 12:41:48<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=469"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="468"></td>
                                                        <td>ISABEL MALDONADO GIMENO</td>
                                                        <td>21005726X</td>
                                                        <td><a
                                                                href="mailto:isa.malgi@gmail.com"><small>isa.malgi@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>626347855</td>
                                                        <td>VALENCIA</td>
                                                        <td>09-09-2024 12:41:48<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=468"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="467"></td>
                                                        <td>MILAGROS TUREGANO HERNANDO</td>
                                                        <td>08932935B</td>
                                                        <td><a
                                                                href="mailto:milature72@gmail.com"><small>milature72@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>690649503</td>
                                                        <td>MADRID</td>
                                                        <td>09-09-2024 12:16:34<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=467"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="466"></td>
                                                        <td>JOSE LUIS JUEZ REOYO</td>
                                                        <td>13120680P</td>
                                                        <td><a
                                                                href="mailto:jljuezr@gmail.com"><small>jljuezr@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>650827910</td>
                                                        <td>BURGOS</td>
                                                        <td>04-09-2024 09:07:40<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=466"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr style="background-color:#ffeff5">
                                                        <td class="bs-checkbox" style="width:36px;"></td>
                                                        <td>ISABEL MARIA ARANDA MARTINEZ</td>
                                                        <td>25387553S</td>
                                                        <td><a
                                                                href="mailto:isamararanda@msn.com"><small>isamararanda@msn.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>610292837</td>
                                                        <td>HUESCA</td>
                                                        <td>03-09-2024 09:05:02<br><small style="color:#f00">Eliminado:
                                                                11-09-2024 09:04:55</span><br></td>
                                                        <td align="center"><a data-toggle="modal"
                                                                data-target="#recuperar" data-idreg="465"
                                                                href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" stroke="currentColor"
                                                                    stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    class="feather feather-rotate-ccw icon-dual">
                                                                    <polyline points="1 4 1 10 7 10"></polyline>
                                                                    <path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="464"></td>
                                                        <td>MARIA REYES VERA MONROY</td>
                                                        <td>78477170C</td>
                                                        <td><a
                                                                href="mailto:queenvemo@hotmail.com"><small>queenvemo@hotmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>630257890</td>
                                                        <td>LAS PALMAS</td>
                                                        <td>28-08-2024 13:19:03<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=464"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="463"></td>
                                                        <td>HUGO PARDO GALLINAR</td>
                                                        <td>58444950H</td>
                                                        <td><a
                                                                href="mailto:hpgpico@gmail.com"><small>hpgpico@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>684648016</td>
                                                        <td>ASTURIAS</td>
                                                        <td>22-08-2024 11:55:35<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=463"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="462"></td>
                                                        <td>FRANCISCA CARMONA JUAREZ</td>
                                                        <td>52485329L</td>
                                                        <td><a
                                                                href="mailto:carmonajuarezpaqui@gmail.com"><small>carmonajuarezpaqui@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>711798634</td>
                                                        <td>SEVILLA</td>
                                                        <td>19-08-2024 10:07:04<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=462"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="461"></td>
                                                        <td>CALVO ADRIAN ANLLO</td>
                                                        <td>33541288C</td>
                                                        <td><a
                                                                href="mailto:adriananllo@hotmail.com"><small>adriananllo@hotmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>699420430</td>
                                                        <td>LAS PALMAS</td>
                                                        <td>14-08-2024 19:58:10<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=461"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr style="background-color:#ffeff5">
                                                        <td class="bs-checkbox" style="width:36px;"></td>
                                                        <td>NAPOLEON BONAPARTE YAPARTES</td>
                                                        <td>40392310D</td>
                                                        <td><a
                                                                href="mailto:napoleon@estoes.fr"><small>napoleon@estoes.fr</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>937666444</td>
                                                        <td>LERIDA</td>
                                                        <td>10-08-2024 16:35:08<br><small style="color:#f00">Eliminado
                                                                por Superadmin: 11-08-2024 16:34:20</span><br></td>
                                                        <td align="center"><a data-toggle="modal"
                                                                data-target="#recuperar" data-idreg="460"
                                                                href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" stroke="currentColor"
                                                                    stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    class="feather feather-rotate-ccw icon-dual">
                                                                    <polyline points="1 4 1 10 7 10"></polyline>
                                                                    <path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="459"></td>
                                                        <td>ANA MARIA RAEZ RUIZ</td>
                                                        <td>44880711Y</td>
                                                        <td><a
                                                                href="mailto:anitask92@gmail.com"><small>anitask92@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>664179148</td>
                                                        <td>VALENCIA</td>
                                                        <td>09-08-2024 13:34:20<br></td>
                                                        <td align="center"><a href="/registros-modificar?idr=459"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="458"></td>
                                                        <td>MARIA DEL CARMEN CARRION NOGUES</td>
                                                        <td>73559088M</td>
                                                        <td><a
                                                                href="mailto:macano2006@gmail.com"><small>macano2006@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>650739316</td>
                                                        <td>VALENCIA</td>
                                                        <td>09-08-2024 13:29:44<br></td>
                                                        <td align="center"><a
                                                                href="/registros-modificar?idr=458"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="457">
                                                        </td>
                                                        <td>LUCIA RODRIGUEZ MORENO</td>
                                                        <td>44872874N</td>
                                                        <td><a
                                                                href="mailto:ladezu@gmail.com"><small>ladezu@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>606747616</td>
                                                        <td>VALENCIA</td>
                                                        <td>09-08-2024 13:29:44<br></td>
                                                        <td align="center"><a
                                                                href="/registros-modificar?idr=457"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="456">
                                                        </td>
                                                        <td>MARIA LORENA BARRABES RIVAS</td>
                                                        <td>18041994N</td>
                                                        <td><a
                                                                href="mailto:lorenabarrabes@msn.com"><small>lorenabarrabes@msn.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>637760148</td>
                                                        <td>HUESCA</td>
                                                        <td>08-08-2024 09:15:48<br></td>
                                                        <td align="center"><a
                                                                href="/registros-modificar?idr=456"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="455">
                                                        </td>
                                                        <td>EDURNE HERRERO HIDALGO</td>
                                                        <td>49024362T</td>
                                                        <td><a
                                                                href="mailto:edurne8-5@hotmail.com"><small>edurne8-5@hotmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>608822667</td>
                                                        <td>MADRID</td>
                                                        <td>18-07-2024 15:08:18<br></td>
                                                        <td align="center"><a
                                                                href="/registros-modificar?idr=455"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="454">
                                                        </td>
                                                        <td>JOSE MARIA COSTA REYES</td>
                                                        <td>31001363P</td>
                                                        <td><a
                                                                href="mailto:josemariacr1903@gmail.com"><small>josemariacr1903@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>644075597</td>
                                                        <td>SEVILLA</td>
                                                        <td>16-07-2024 13:24:23<br></td>
                                                        <td align="center"><a
                                                                href="/registros-modificar?idr=454"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="453">
                                                        </td>
                                                        <td>TRINIDAD REYES MACIAS</td>
                                                        <td>28854768A</td>
                                                        <td><a
                                                                href="mailto:TRINIREMA@GMAIL.COM"><small>TRINIREMA@GMAIL.COM</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>655368014</td>
                                                        <td>SEVILLA</td>
                                                        <td>16-07-2024 13:24:23<br></td>
                                                        <td align="center"><a
                                                                href="/registros-modificar?idr=453"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="452">
                                                        </td>
                                                        <td>ALMUDENA FERRE CAMARENA</td>
                                                        <td>53350045G</td>
                                                        <td><a
                                                                href="mailto:ainhoajulio7@gmail.com"><small>ainhoajulio7@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>601294383</td>
                                                        <td>SEVILLA</td>
                                                        <td>16-07-2024 13:24:23<br></td>
                                                        <td align="center"><a
                                                                href="/registros-modificar?idr=452"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="451">
                                                        </td>
                                                        <td>SILVIA ALONSO RAMIRO</td>
                                                        <td>49066957E</td>
                                                        <td><a
                                                                href="mailto:silvia.alonso.ramiro@gmail.com"><small>silvia.alonso.ramiro@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>650604085</td>
                                                        <td>MADRID</td>
                                                        <td>15-07-2024 21:50:18<br></td>
                                                        <td align="center"><a
                                                                href="/registros-modificar?idr=451"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="450">
                                                        </td>
                                                        <td>RAFAEL FERNANDEZ HERVELLA</td>
                                                        <td>11829288C</td>
                                                        <td><a
                                                                href="mailto:fernandezhervellarafael@gmail.com"><small>fernandezhervellarafael@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>646233489</td>
                                                        <td>MADRID</td>
                                                        <td>15-07-2024 21:46:57<br></td>
                                                        <td align="center"><a
                                                                href="/registros-modificar?idr=450"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr style="background-color:#ffeff5">
                                                        <td class="bs-checkbox" style="width:36px;"></td>
                                                        <td>GARCIÑUNO GARCIA GARCIA</td>
                                                        <td>55555555K</td>
                                                        <td><a
                                                                href="mailto:5555@ssssss.es"><small>5555@ssssss.es</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>555555555</td>
                                                        <td>LERIDA</td>
                                                        <td>11-07-2024 12:49:58<br><small style="color:#f00">Eliminado
                                                                por Superadmin: 11-08-2024 16:17:29</span><br></td>
                                                        <td align="center"><a data-toggle="modal"
                                                                data-target="#recuperar" data-idreg="449"
                                                                href="#"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-rotate-ccw icon-dual">
                                                                    <polyline points="1 4 1 10 7 10"></polyline>
                                                                    <path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr style="background-color:#ffeff5">
                                                        <td class="bs-checkbox" style="width:36px;"></td>
                                                        <td>MARIO GONZALEZW PEREZ</td>
                                                        <td>44444444A</td>
                                                        <td><a
                                                                href="mailto:ssssssssss@fffff.com"><small>ssssssssss@fffff.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>999999999</td>
                                                        <td>LERIDA</td>
                                                        <td>11-07-2024 12:49:58<br><small style="color:#f00">Eliminado
                                                                por Superadmin: 11-08-2024 16:17:29</span><br></td>
                                                        <td align="center"><a data-toggle="modal"
                                                                data-target="#recuperar" data-idreg="448"
                                                                href="#"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-rotate-ccw icon-dual">
                                                                    <polyline points="1 4 1 10 7 10"></polyline>
                                                                    <path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="447">
                                                        </td>
                                                        <td>MARIA INMACULADA HIDALGO ESTEBANEZ</td>
                                                        <td>46673589B</td>
                                                        <td><a
                                                                href="mailto:immahidalgo@gmail.com"><small>immahidalgo@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>636449490</td>
                                                        <td>GERONA</td>
                                                        <td>10-07-2024 12:28:09<br></td>
                                                        <td align="center"><a
                                                                href="/registros-modificar?idr=447"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="446">
                                                        </td>
                                                        <td>CECILIA DIAZ TORRENT</td>
                                                        <td>46604215M</td>
                                                        <td><a
                                                                href="mailto:sisidiaz@hotmail.com"><small>sisidiaz@hotmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>615731437</td>
                                                        <td>GERONA</td>
                                                        <td>10-07-2024 12:12:22<br></td>
                                                        <td align="center"><a
                                                                href="/registros-modificar?idr=446"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="445">
                                                        </td>
                                                        <td>MARIA SORAYA VELASCO TORRENTE</td>
                                                        <td>51674806Q</td>
                                                        <td><a
                                                                href="mailto:pacabert@yahoo.es"><small>pacabert@yahoo.es</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>649371923</td>
                                                        <td>MADRID</td>
                                                        <td>09-07-2024 12:34:25<br></td>
                                                        <td align="center"><a
                                                                href="/registros-modificar?idr=445"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="444">
                                                        </td>
                                                        <td>MARIA DE LA LUZ ARDURA FERNANDEZ</td>
                                                        <td>50456958H</td>
                                                        <td><a
                                                                href="mailto:maryluz_1974@hotmail.es"><small>maryluz_1974@hotmail.es</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>619046995</td>
                                                        <td>MADRID</td>
                                                        <td>09-07-2024 11:54:49<br></td>
                                                        <td align="center"><a
                                                                href="/registros-modificar?idr=444"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="443">
                                                        </td>
                                                        <td>CARLOS DE NOVA NAVARRO</td>
                                                        <td>44878610K</td>
                                                        <td><a
                                                                href="mailto:yngwell84@gmail.com"><small>yngwell84@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>647783871</td>
                                                        <td>VALENCIA</td>
                                                        <td>08-07-2024 13:10:19<br></td>
                                                        <td align="center"><a
                                                                href="/registros-modificar?idr=443"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="442">
                                                        </td>
                                                        <td>SONIA MUÑOZ VALENCIANO</td>
                                                        <td>50230455L</td>
                                                        <td><a
                                                                href="mailto:lanenasony@gmail.com"><small>lanenasony@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>680512971</td>
                                                        <td>MADRID</td>
                                                        <td>03-07-2024 09:48:12<br></td>
                                                        <td align="center"><a
                                                                href="/registros-modificar?idr=442"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="441">
                                                        </td>
                                                        <td>ANA MARIA PATRICIO HALDON</td>
                                                        <td>05414006J</td>
                                                        <td><a
                                                                href="mailto:analejmay@gmail.com"><small>analejmay@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>657203365</td>
                                                        <td>MADRID</td>
                                                        <td>03-07-2024 09:48:12<br></td>
                                                        <td align="center"><a
                                                                href="/registros-modificar?idr=441"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="440">
                                                        </td>
                                                        <td>OLGA MADRID GARCIA</td>
                                                        <td>07516978A</td>
                                                        <td><a
                                                                href="mailto:monamadrid17@gmail.com"><small>monamadrid17@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>639542658</td>
                                                        <td>MADRID</td>
                                                        <td>02-07-2024 12:49:18<br></td>
                                                        <td align="center"><a
                                                                href="/registros-modificar?idr=440"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="439">
                                                        </td>
                                                        <td>GLORIA VALERIA SANTANA JEREZ</td>
                                                        <td>Y2782058S</td>
                                                        <td><a
                                                                href="mailto:anabella1185@hotmail.com"><small>anabella1185@hotmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>744631296</td>
                                                        <td>VALENCIA</td>
                                                        <td>01-07-2024 14:00:50<br></td>
                                                        <td align="center"><a
                                                                href="/registros-modificar?idr=439"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr style="background-color:#ffeff5">
                                                        <td class="bs-checkbox" style="width:36px;"></td>
                                                        <td>ANTONIA AFILIADA DEL LIBRE</td>
                                                        <td>00000000T</td>
                                                        <td><a
                                                                href="mailto:77777@77777.com"><small>77777@77777.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>666666666</td>
                                                        <td>LERIDA</td>
                                                        <td>01-07-2024 12:48:12<br><small style="color:#f00">Eliminado
                                                                por Superadmin: 11-08-2024 16:17:29</span><br></td>
                                                        <td align="center"><a data-toggle="modal"
                                                                data-target="#recuperar" data-idreg="438"
                                                                href="#"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-rotate-ccw icon-dual">
                                                                    <polyline points="1 4 1 10 7 10"></polyline>
                                                                    <path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="437">
                                                        </td>
                                                        <td>JAIME LUENGO SANZ</td>
                                                        <td>50114500F</td>
                                                        <td><a
                                                                href="mailto:jaimeluengo79@hotmail.com"><small>jaimeluengo79@hotmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>672247597</td>
                                                        <td>MADRID</td>
                                                        <td>01-07-2024 11:37:11<br></td>
                                                        <td align="center"><a
                                                                href="/registros-modificar?idr=437"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="436">
                                                        </td>
                                                        <td>ROBERTO MORENO DEL AMO</td>
                                                        <td>51101861R</td>
                                                        <td><a
                                                                href="mailto:harrobe@hotmail.com"><small>harrobe@hotmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>679150074</td>
                                                        <td>MADRID</td>
                                                        <td>01-07-2024 11:31:39<br></td>
                                                        <td align="center"><a
                                                                href="/registros-modificar?idr=436"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr style="background-color:#ffeff5">
                                                        <td class="bs-checkbox" style="width:36px;"></td>
                                                        <td>FULANA MIGUEL ZUTANEZ RAMIREZ</td>
                                                        <td>66666666Q</td>
                                                        <td><a
                                                                href="mailto:correo@formacion.com"><small>correo@formacion.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>000000000</td>
                                                        <td>LERIDA</td>
                                                        <td>28-06-2024 13:08:36<br><small style="color:#f00">Eliminado
                                                                por Superadmin: 11-08-2024 16:17:29</span><br></td>
                                                        <td align="center"><a data-toggle="modal"
                                                                data-target="#recuperar" data-idreg="435"
                                                                href="#"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-rotate-ccw icon-dual">
                                                                    <polyline points="1 4 1 10 7 10"></polyline>
                                                                    <path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path>
                                                                </svg></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bs-checkbox" style="width:36px;"><input
                                                                type="checkbox" class="delCheck" value="434">
                                                        </td>
                                                        <td>JAVIER ZAMORA PINA</td>
                                                        <td>00827192C</td>
                                                        <td><a
                                                                href="mailto:jzamorapina@gmail.com"><small>jzamorapina@gmail.com</small></a><br><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" style="margin-right:5px;"
                                                                viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone icon-dual"
                                                                style="width:15px;height:15px;margin-right:5px;">
                                                                <path
                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                </path>
                                                            </svg>649363370</td>
                                                        <td>MADRID</td>
                                                        <td>28-06-2024 11:59:51<br></td>
                                                        <td align="center"><a
                                                                href="/registros-modificar?idr=434"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit icon-dual">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a></td>
                                                    </tr>
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
    
                                            <ul class="pagination pagination-rounded justify-content-end">
                                                <li class="page-item active"><a class="page-link"
                                                        href="?p=1">1</a></li>
                                                <li class="page-item "><a class="page-link" href="?p=2">2</a>
                                                </li>
                                                <li class="page-item "><a class="page-link" href="?p=3">3</a>
                                                </li>
                                                <li class="page-item "><a class="page-link" href="?p=4">4</a>
                                                </li>
                                                <li class="page-item "><a class="page-link" href="?p=5">5</a>
                                                </li>
    
                                                <li class="page-item"><a class="page-link" href="?p=10">»</a>
                                                </li>
    
                                            </ul>
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div> <!-- container -->
    
            </div> <!-- content -->
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
                                                <option value="0">Todas</option>
                                                <option value="1">ALAVA</option>
                                                <option value="2">ALBACETE</option>
                                                <option value="3">ALICANTE</option>
                                                <option value="4">ALMERIA</option>
                                                <option value="5">ASTURIAS</option>
                                                <option value="6">AVILA</option>
                                                <option value="7">BADAJOZ</option>
                                                <option value="8">BARCELONA</option>
                                                <option value="9">BURGOS</option>
                                                <option value="10">CACERES</option>
                                                <option value="11">CADIZ</option>
                                                <option value="12">CANTABRIA</option>
                                                <option value="13">CASTELLON</option>
                                                <option value="14">CIUDAD REAL</option>
                                                <option value="15">CORDOBA</option>
                                                <option value="16">CUENCA</option>
                                                <option value="17">GERONA</option>
                                                <option value="18">GRANADA</option>
                                                <option value="19">GUADALAJARA</option>
                                                <option value="20">GUIPUZCOA</option>
                                                <option value="21">HUELVA</option>
                                                <option value="22">HUESCA</option>
                                                <option value="23">ISLAS BALEARES</option>
                                                <option value="24">JAEN</option>
                                                <option value="25">LA CORUNA</option>
                                                <option value="26">LA RIOJA</option>
                                                <option value="27">LAS PALMAS</option>
                                                <option value="28">LEON</option>
                                                <option value="29">LERIDA</option>
                                                <option value="30">LUGO</option>
                                                <option value="31">MADRID</option>
                                                <option value="32">MALAGA</option>
                                                <option value="33">MURCIA</option>
                                                <option value="34">NAVARRA</option>
                                                <option value="35">ORENSE</option>
                                                <option value="36">PALENCIA</option>
                                                <option value="37">PONTEVEDRA</option>
                                                <option value="38">SALAMANCA</option>
                                                <option value="39">SANTA CRUZ DE TENERIFE</option>
                                                <option value="40">SEGOVIA</option>
                                                <option value="41">SEVILLA</option>
                                                <option value="42">SORIA</option>
                                                <option value="43">TARRAGONA</option>
                                                <option value="44">TERUEL</option>
                                                <option value="45">TOLEDO</option>
                                                <option value="46">VALENCIA</option>
                                                <option value="47">VALLADOLID</option>
                                                <option value="48">VIZCAYA</option>
                                                <option value="49">ZAMORA</option>
                                                <option value="50">ZARAGOZA</option>
                                                <option value="51">CEUTA</option>
                                                <option value="52">MELILLA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
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
                                                        <input id="eventual" name="eventual" type="checkbox">
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
                                <!-- <div class="row">
                                <div class="col-12">
                                    <label><strong>Cuota</strong></label>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <div class="checkbox mb-2">
                                                    <input id="nomina" name="nomina" type="checkbox">
                                                    <label for="nomina">Nómina</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <div class="checkbox mb-2">
                                                    <input id="banco" name="banco" type="checkbox">
                                                    <label for="banco">Banco</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                                <div class="row">
                                    <div class="col-12">
                                        <label><strong>Formación para la consolidación de empleo</strong></label>
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
                                                        <label for="fasj_productos">Productos y servicios</label>
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
                                                        <label for="faje_productos">Productos y servicios</label>
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
                                <div class="row">
                                    <div class="col-12">
                                        <label><strong>Cursos</strong></label>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="checkbox mb-2">
                                                        <input id="curso_1" name="cursos[]" value="1"
                                                            type="checkbox">
                                                        <label for="curso_1">Microsoft Teams</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="checkbox mb-2">
                                                        <input id="curso_2" name="cursos[]" value="2"
                                                            type="checkbox">
                                                        <label for="curso_2">Google Drive</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="checkbox mb-2">
                                                        <input id="curso_3" name="cursos[]" value="3"
                                                            type="checkbox">
                                                        <label for="curso_3">Gestión del cambio en la Transformación
                                                            Digital</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="checkbox mb-2">
                                                        <input id="curso_4" name="cursos[]" value="4"
                                                            type="checkbox">
                                                        <label for="curso_4">Excel 365</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="checkbox mb-2">
                                                        <input id="curso_5" name="cursos[]" value="5"
                                                            type="checkbox">
                                                        <label for="curso_5">Access 365</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="checkbox mb-2">
                                                        <input id="curso_6" name="cursos[]" value="6"
                                                            type="checkbox">
                                                        <label for="curso_6">Outlook 365</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="checkbox mb-2">
                                                        <input id="curso_7" name="cursos[]" value="7"
                                                            type="checkbox">
                                                        <label for="curso_7">Cómo dinamizar tu presentación</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="checkbox mb-2">
                                                        <input id="curso_8" name="cursos[]" value="8"
                                                            type="checkbox">
                                                        <label for="curso_8">Gestión del Tiempo</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="checkbox mb-2">
                                                        <input id="curso_9" name="cursos[]" value="9"
                                                            type="checkbox">
                                                        <label for="curso_9">Toma de Decisiones</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="checkbox mb-2">
                                                        <input id="curso_10" name="cursos[]" value="10"
                                                            type="checkbox">
                                                        <label for="curso_10">Planificación Comercial</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    
            @include('partials.footer')
    
        </div>
    
    </div>
    
    <div style="position: fixed; top: 80px; right: 10px; z-index:1000" id="toasts"></div>
</x-layout>





