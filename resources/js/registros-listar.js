$(function () {
    $(".selectAll").change(function () {
        // Desmarcar todos los checkboxes antes de marcar los visibles
        $(".delCheck").prop("checked", false);

        // Marcar solo los checkboxes visibles en el momento actual
        $("tbody:visible .delCheck").prop("checked", $(this).prop("checked"));

        // Actualizar el estado del botón de eliminación
        updateDeleteButtonState();
    });
    // Habilitar/deshabilitar el botón de borrado según la selección de registros
    $("body").on("change", ".delCheck", function () {
        updateDeleteButtonState();
    });
    // Mostrar SweetAlert al hacer clic en el botón de borrado
    $("#deleteButton").click(function () {
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción borrará los registros seleccionados.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, borrar'
        }).then((result) => {
            if (result.isConfirmed) {
                var selectedRecords = $(".delCheck:checked").map(function () {
                    return this.value;
                }).get();

                if (selectedRecords.length > 0) {

                    $.ajax({
                        url: 'reg-borrar',
                        type: 'POST',
                        data: { recordIds: selectedRecords },
                        success: function (response) {
                            console.log(response);
                            if (response == "ok") {
                                Swal.fire('¡Borrado!', 'Los registros han sido eliminados.', 'success').then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire('Error', 'Hubo un problema al borrar los registros.', 'error');
                            }
                        },
                        error: function () {
                            Swal.fire('Error', 'Hubo un problema al comunicarse con el servidor.', 'error');
                        }
                    });
                }
            }
        });
    });
    function actualizarParametroURL(uri, key, value) {
        var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
        if (uri.match(re)) {
            return uri.replace(re, '$1' + key + "=" + value + '$2');
        } else {
            return uri + separator + key + "=" + value;
        }
    }

    $('#provincia').change(function () {
        var provinciaSeleccionada = $(this).val();
        var currentUrl = window.location.href;
        currentUrl = currentUrl.split('?')[0]; // Remove existing query string

        if (provinciaSeleccionada != 0) {
            currentUrl = actualizarParametroURL(currentUrl, 'v', provinciaSeleccionada);
        }

        var tipoSeleccionado = $('#tipo_registro').val();
        if (tipoSeleccionado != 0) {
            currentUrl = actualizarParametroURL(currentUrl, 't', tipoSeleccionado);
        }

        window.location.href = currentUrl;
    });

    $('#tipo_registro').change(function () {
        var tipoSeleccionado = $(this).val();
        var currentUrl = window.location.href;
        currentUrl = currentUrl.split('?')[0]; // Remove existing query string

        if (tipoSeleccionado != 0) {
            currentUrl = actualizarParametroURL(currentUrl, 't', tipoSeleccionado);
        }

        var provinciaSeleccionada = $('#provincia').val();
        if (provinciaSeleccionada != 0) {
            currentUrl = actualizarParametroURL(currentUrl, 'v', provinciaSeleccionada);
        }

        window.location.href = currentUrl;
    });
    // Función para habilitar/deshabilitar el botón de borrado
    function updateDeleteButtonState() {
        var anyChecked = $(".delCheck:checked").length > 0;
        $("#deleteButton").prop("disabled", !anyChecked);
        $("#deleteButtonMod").prop("disabled", !anyChecked);
        $("#deleteButtonElim").prop("disabled", !anyChecked);
    }
    $("#txtbusca").keyup(function () {
        var parametros = "txtbusca=" + $(this).val().trim();
        $(".selectAll").prop("checked", false);
        $(".delCheck").prop("checked", false);
        $("#deleteButton").prop("disabled", true);
        var contarCar = 11;
        if ($('#provincia').val() > 0) {
            parametros = parametros + "&v=" + $('#provincia').val();
            contarCar = contarCar + 5;
        }
        if ($('#tipo_registro').val() > 0) {
            parametros = parametros + "&t=" + $('#tipo_registro').val();
            contarCar = contarCar + 5;
        }
        if (parametros.length > contarCar) {
            $("#b_regs_buscador").show();
            $("#b_regs").hide();
            $(".pagination").hide();
            $.ajax({
                data: parametros,
                url: 'reg-buscador',
                type: 'post',
                success: function (response) {
                    $("#b_regs_buscador").html(response);
                },
                error: function () {
                    alert("error")
                }
            });
        } else {
            $("#b_regs").show();
            $("#b_regs_buscador").hide();
            $(".pagination").show();
        }
    });

    $('#txtbusca').on('input', function () {
        var inputValue = $(this).val();
        var sanitizedValue = inputValue.replace(/[^a-zA-Z0-9ñÑüÜ@.\s]/g, ''); // Elimina caracteres no permitidos

        if (inputValue !== sanitizedValue) {
            // Si se encontraron caracteres no permitidos, actualiza el valor del campo
            $(this).val(sanitizedValue);
        }
    });
    $("#txtbuscaMod").keyup(function () {
        var parametros = "txtbusca=" + $(this).val().trim();
        $(".selectAll").prop("checked", false);
        $(".delCheck").prop("checked", false);
        $("#deleteButton").prop("disabled", true);
        var contarCar = 11;
        if ($('#provincia').val() > 0) {
            parametros = parametros + "&v=" + $('#provincia').val();
            contarCar = contarCar + 5;
        }
        if ($('#tipo_registro').val() > 0) {
            parametros = parametros + "&t=" + $('#tipo_registro').val();
            contarCar = contarCar + 5;
        }
        if (parametros.length > contarCar) {
            $("#b_regs_buscador").show();
            $("#b_regs").hide();
            $(".pagination").hide();
            $.ajax({
                data: parametros,
                url: 'reg-buscador-modificados',
                type: 'post',
                success: function (response) {
                    $("#b_regs_buscador").html(response);
                },
                error: function () {
                    alert("error")
                }
            });
        } else {
            $("#b_regs").show();
            $("#b_regs_buscador").hide();
            $(".pagination").show();
        }
    });

    $('#txtbuscaMod').on('input', function () {
        var inputValue = $(this).val();
        var sanitizedValue = inputValue.replace(/[^a-zA-Z0-9ñÑüÜ@.\s]/g, ''); // Elimina caracteres no permitidos

        if (inputValue !== sanitizedValue) {
            // Si se encontraron caracteres no permitidos, actualiza el valor del campo
            $(this).val(sanitizedValue);
        }
    });

    $('#informes_form').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData($('#informes_form')[0]);
        var modal = $('#informes');

        $.ajax({
            url: '/generar-informe',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                console.log(response);
                if (response.hasOwnProperty('archivo')) {
                    $.toast({
                        heading: '¡Informe generado!',
                        text: 'Comprueba tu zona de descargas',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        loaderBg: '#00b09b',
                        hideAfter: 3000
                    });
                    // Redirigimos a la página de descarga
                    window.location.href = 'descargar-informe?archivo=' + encodeURIComponent(response.archivo);
                } else if (response.hasOwnProperty('error')) {
                    if (response.error == "errorFechas1") {
                        $.toast({
                            heading: '¡Error!',
                            text: 'Debe introducir un rango de fechas válido.',
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            loaderBg: '#00b09b',
                            hideAfter: 3000
                        });
                    } else if (response.error == "errorProvincia") {
                        $.toast({
                            heading: 'Error',
                            text: 'Hubo un error, consulte al técnico.',
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            loaderBg: '#00b09b',
                            hideAfter: 3000
                        });
                    } else if (response.error == "errorNoInformes") {
                        $.toast({
                            heading: 'Información',
                            text: 'No hay registros con los filtros indicados.',
                            showHideTransition: 'fade',
                            icon: 'info',
                            position: 'top-right',
                            loaderBg: '#00b09b',
                            hideAfter: 3000
                        });
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error al generar el informe:', textStatus, errorThrown);
            }
        });
    });
    
    $('#excel_file').on('change', function() {
        var files = $(this)[0].files;
        var maxSize = 20 * 1024 * 1024; // Tamaño máximo permitido en bytes (20MB)
        var allowedExtensions = ["xls", "xlsx"];
    
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var fileSize = file.size;
            var fileName = file.name;
            var fileExtension = fileName.split('.').pop().toLowerCase();
    
            if (!allowedExtensions.includes(fileExtension)) {
                $.toast({
                    heading: 'Error',
                    text: 'No ha seleccionado ningún archivo xls o xlsx.',
                    showHideTransition: 'fade',
                    icon: 'error',
                    position: 'top-right',
                    loaderBg: '#00b09b',
                    hideAfter: 3000
                });
                $(this).val(''); // Borrar el valor del input file para deseleccionar el archivo
                return false; // Detener el proceso de carga
            }
            if (fileSize > maxSize) {
                $.toast({
                    heading: 'Error',
                    text: 'Archivo con un tamaño superior a 20MB.',
                    showHideTransition: 'fade',
                    icon: 'error',
                    position: 'top-right',
                    loaderBg: '#00b09b',
                    hideAfter: 3000
                });
                $(this).val(''); // Borrar el valor del input file para deseleccionar el archivo
                return false; // Detener el proceso de carga
            }
        }
    });
    
    $('#submit_excel').on('submit', function(e) {
        e.preventDefault();
        var $submitButton = $('#env_btn');
        $submitButton.attr('disabled', true).html('<i class="mdi mdi-spin mdi-loading"></i> Subiendo documento...');    
        var form_data = new FormData(this);        
        $.ajax({
            type: 'POST',
            url: 'cargar-excel',
            data: form_data,
            contentType: false,
            processData: false,
            dataType: 'json',
            xhr: function() {
                var xhr = $.ajaxSettings.xhr();
                xhr.upload.onprogress = function(e) {
                    if (e.lengthComputable) {
                        var percent = Math.round((e.loaded / e.total) * 100);
                        $submitButton.html('<i class="mdi mdi-spin mdi-loading"></i>  Subiendo documento...' + percent + '%');
                    }
                };
                return xhr;
            },
            success: function(response) {
                // console.log(response);
                $submitButton.attr('disabled', false).text('Importar');
                if (response.hasOwnProperty('ok')) {
                    $submitButton.text('Importar');
                    $.toast({
                        heading: '¡Carga finalizada!',
                        text: 'Actualice listado...',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        loaderBg: '#00b09b',
                        hideAfter: 3000
                    });
                } else if (response.hasOwnProperty('error')) {
                    
                    if (response.error == "errorArchivoVacio") {
                        $.toast({
                            heading: 'Error',
                            text: 'No ha seleccionado ningún archivo para cargar.',
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            loaderBg: '#00b09b',
                            hideAfter: 3000
                        });
                    } else if (response.error == "errorExtensionArchivo") {
                        $.toast({
                            heading: 'Error',
                            text: 'No ha seleccionado ningún archivo xls o xlsx.',
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            loaderBg: '#00b09b',
                            hideAfter: 3000
                        });
                    } else if (response.error == "errorTamanoArchivo") {
                        $.toast({
                            heading: 'Error',
                            text: 'Archivo con un tamaño superior a 20MB.',
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            loaderBg: '#00b09b',
                            hideAfter: 3000
                        });
                    } else if (response.error == "errorCargaArchivo") {
                        $.toast({
                            heading: 'Error',
                            text: 'Error en la carga: ' + response.infoError,
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            loaderBg: '#00b09b',
                            hideAfter: 10000
                        });
                    } else if (response.error == "errorSolicitud") {
                        $.toast({
                            heading: 'Error',
                            text: 'Error en la carga.',
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            loaderBg: '#00b09b',
                            hideAfter: 3000
                        });
                    }
                }
                $("#submit_excel")[0].reset();
            },
            error: function(response) {
                $submitButton.attr('disabled', false).text('Importar');
                $.toast({
                    heading: '¡Error!',
                    text: 'Error al subir el archivo. Consulte al técnico.',
                    showHideTransition: 'fade',
                    icon: 'error',
                    position: 'top-right',
                    loaderBg: '#00b09b',
                    hideAfter: 3000
                });
            }
        });
    });    

    $("#rango-fechas").flatpickr({
        dateFormat: "d-m-Y", // Formato de fecha
        enableTime: false, // Desactivar selección de tiempo
        locale: "es", // Establecer idioma en español
        weekStart: 1, // Establecer el lunes como primer día de la semana
        mode: "range",
        minDate: "24-05-2024",
        maxDate: "today"
    });

    $('body').on('click','a[data-target="#recuperar"]',function(e) {
        e.preventDefault(); // Evita el comportamiento predeterminado del enlace
        var idRegistro = $(this).data('idreg'); // Obtiene el valor de data-idreg
        // Abre el modal de recuperación
        $('#recuperarModal').modal('show');
        // Asigna el valor de data-idreg al botón de confirmación del modal
        $('#confirmRecuperarBtn').data('idreg', idRegistro);
    });
    // Captura el clic en el botón de confirmación del modal
    $('#confirmRecuperarBtn').click(function() {
        var idRegistro = $(this).data('idreg');
        // Envía el ID de registro a recuperar a través de AJAX
        $.ajax({
            url: 'recuperar-registro',
            method: 'POST',
            data: { idRegistro: idRegistro },
            dataType: 'json',
            success: function(response) {
                // Maneja la respuesta de recuperar.php
                console.log(response);
                if (response.hasOwnProperty('ok')) {
                    $.toast({
                        heading: '¡Registro recuperado!',
                        text: 'Actualizando listado...',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        loaderBg: '#00b09b',
                        hideAfter: 3000
                    });
                    location.reload();
                } else if (response.hasOwnProperty('error')) {                    
                    if (response.error == "error") {
                        $.toast({
                            heading: 'Error',
                            text: 'Algo ha ido mal, inténtelo un poco más tarde.',
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            loaderBg: '#00b09b',
                            hideAfter: 3000
                        });
                    } else if (response.error == "errorNoEncontrado") {
                        $.toast({
                            heading: 'Error',
                            text: 'Registro no encontrado',
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            loaderBg: '#00b09b',
                            hideAfter: 3000
                        });
                    } else if (response.error == "errorEmail") {
                        $.toast({
                            heading: 'Error',
                            text: 'Ya existe un registro activo con ese email.',
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            loaderBg: '#00b09b',
                            hideAfter: 3000
                        });
                    } else if (response.error == "errorDni") {
                        $.toast({
                            heading: 'Error',
                            text: 'Ya existe un registro activo con ese DNI.',
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            loaderBg: '#00b09b',
                            hideAfter: 3000
                        });
                    }
                }
                // Cierra el modal de recuperación
                $('#recuperarModal').modal('hide');
            },
            error: function(xhr, status, error) {
                // Maneja errores de la solicitud AJAX
                console.error(xhr.responseText);
            }
        });
    });
    $("body").on('click','.ver-mod',function(){
        var id = $(this).data("id");
        var $row = $(this).closest('tr');
        
        // Comprobar si la fila ya ha sido agregada
        if ($row.next('.addedRow').length) {
            // Si la fila ya ha sido agregada, quitarla y salir de la función
            $row.next('.addedRow').remove();
            return;
        }
        
        $.ajax({
            url: 'ver-modificados',
            type: 'POST',
            data: { id: id },
            success: function(data) {
                if(data == 0){
                    $.toast({
                        heading: 'Error',
                        text: 'Algo ha ido mal, inténtelo un poco más tarde.',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        loaderBg: '#00b09b',
                        hideAfter: 3000
                    });
                } else {
                    // Agregar una nueva fila después de la fila actual
                    var newRow = '<tr class="addedRow"><td colspan="7" style="background-color:#FFF">'+ data +'</td></tr>';
                    $(newRow).insertAfter($row); // Usar la referencia al elemento 'a'
                    $row.removeAttr("style");
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    $("#deleteButtonMod").click(function () {
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción borrará los registros seleccionados.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, borrar'
        }).then((result) => {
            if (result.isConfirmed) {
                var selectedRecords = $(".delCheck:checked").map(function () {
                    return this.value;
                }).get();

                if (selectedRecords.length > 0) {

                    $.ajax({
                        url: 'reg-borrar-modificados',
                        type: 'POST',
                        data: { recordIds: selectedRecords },
                        success: function (response) {
                            if (response == "ok") {
                                Swal.fire('¡Borrado!', 'Los registros han sido eliminados.', 'success').then(() => {
                                    window.location.href = '/registros-listar-modificados';
                                });
                            } else {
                                Swal.fire('Error', 'Hubo un problema al borrar los registros.', 'error');
                            }
                        },
                        error: function () {
                            Swal.fire('Error', 'Hubo un problema al comunicarse con el servidor.', 'error');
                        }
                    });
                }
            }
        });
    });    
    $("#deleteButtonElim").click(function () {
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción borrará los registros seleccionados.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, borrar'
        }).then((result) => {
            if (result.isConfirmed) {
                var selectedRecords = $(".delCheck:checked").map(function () {
                    return this.value;
                }).get();

                if (selectedRecords.length > 0) {

                    $.ajax({
                        url: 'reg-borrar-eliminados',
                        type: 'POST',
                        data: { recordIds: selectedRecords },
                        success: function (response) {
                            if (response == "ok") {
                                Swal.fire('¡Borrado!', 'Los registros han sido eliminados.', 'success').then(() => {
                                    window.location.href = '/registros-listar-eliminados';
                                });
                            } else {
                                Swal.fire('Error', 'Hubo un problema al borrar los registros.', 'error');
                            }
                        },
                        error: function () {
                            Swal.fire('Error', 'Hubo un problema al comunicarse con el servidor.', 'error');
                        }
                    });
                }
            }
        });
    });    
});
