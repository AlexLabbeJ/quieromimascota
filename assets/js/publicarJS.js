$(document).ready(function () {
    $("#tipo_aviso").change(function (event) {
        if ($("#tipo_aviso").val() == "") {
            removerInputs();
        } else {
            tipoAviso($("#tipo_aviso").val());
        }
    });
    $("#img1").change(function () {
        cargaImagen("1");
    });
    $("#img2").change(function () {
        cargaImagen("2");
    });
    $("#img3").change(function () {
        cargaImagen("3");
    });
    $("#img4").change(function () {
        cargaImagen("4");
    });
    $("#img5").change(function () {
        cargaImagen("5");
    });
    $("#img6").change(function () {
        cargaImagen("6");
    });
    $("#tipomascota").change(function () {
        razasSelect($("#tipomascota").val());
    });
});
function removerInputs() {
    $("#div_fecha").remove();
    $("#div_lugar").remove();
    $("#div_nombre").remove();
    $("#div_edad").remove();
}
function tipoAviso(tipo) {
    removerInputs();
    $(".has-error").removeClass('has-error');
    if (tipo == "encontrada") {
        $("#div_titulo").after(generarInput("fecha", "div_fecha", MayusPrimera(tipo) + " el"));
        $("#div_comuna").after(generarInput("lugar", "div_lugar", "Lugar"));
    }
    if (tipo == "desaparecida") {
        $("#div_titulo").after(generarInput("fecha", "div_fecha", MayusPrimera(tipo) + " el"));
        $("#div_comuna").after(generarInput("lugar", "div_lugar", "Lugar"));
        $("#div_tipomascota").before(generarInput("nombremascota", "div_nombre", "Nombre de mascota"));
        $("#div_genero").after(generarInput("edad", "div_edad", "Edad aprox"));
    }
    if (tipo == "adopcion") {
        $("#div_tipomascota").before(generarInput("nombremascota", "div_nombre", "Nombre de mascota"));
        $("#div_genero").after(generarInput("edad", "div_edad", "Edad aprox."));
    }
    if (tipo == "adoptar") {
        $("#div_genero").after(generarInput("edad", "div_edad", "Edad aprox."));
    }
    $("#fecha").datepicker({
        onClose: function () {
            if ($("#fecha").val() != "") {
                $(".fecha").removeClass('has-error');
                $("#err_fecha").remove();
            }
        },
        dateFormat: 'dd-mm-yy',
        monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
            "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec"],
        dayNames: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
        dayNamesShort: ["Dom", "Lun", "Mar", "Mier", "Juev", "Vier", "Sab"],
        dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"]
    });
}
/*@author Claudio
 * @description Esta funcion genera un input, puede generar un input de tipo select o text, tambien puedes pasarle un array con los datos de tipo ListItem
 * @argument {String} idInput el id y el name del input
 * @argument {String} idLabel el id del label
 * @argument {String} titulo El texto que va a aparecer en el spam
 * @argument {String} tipo por defecto es text y puede ser un select.
 * @argument {Array[ListItem]} datos si el input es un select debe ingresar una lista con los datos.
 Si no se especifica solo quedara una opcion por defecto que es Seleccionar.
 * @argument {String} clase css.
 * @returns {String}
 */
function generarInput(idInput, idLabel, titulo, tipo = "text", datos = null, clase = "form-select") {
    var txt = '<div class="form-group" id="' + idLabel + '">';
    txt += "<label for='" + idInput + "' class='col-lg-2 control-label'>" + titulo + "</label>";
    txt += '<div class="col-lg-4 input-group-sm ' + idInput + '">';
    if (tipo == 'select') {
        txt += '<select name="' + idInput + '" id="' + idInput + '" class="form-control input-sm">';
        txt += '<option value="">«Selecciona»</option>';
        if (datos != null) {
            datos.forEach((item) => {
                txt += '<option value="' + item.value + '">' + item.texto + '</option>';
            });
        }
        txt += '</select>';
    } else {
        if (titulo == "Lugar") {
            txt += '<input class="form-control input-sm" type="' + tipo + '" id="' + idInput + '" placeholder="Ej: plaza de armas" name="' + idInput + '">';
        } else {
            txt += '<input class="form-control input-sm" type="' + tipo + '" id="' + idInput + '" name="' + idInput + '">';
        }
    }
    txt += '</div>';
    txt += '</div>';
    return txt;
}

$("#region").change(function () {
    $("#comuna").append('<option value="" id="option_comuna">«Selecciona»</option>');
    var id = 'value=' + $("#region").val();
    $.ajax({
        url: base.base_url + 'RegionComuna/cargarcomunas',
        type: 'POST',
        data: id,
        dataType: 'json',
        success: function (data) {
            var comunas = $("#comuna");
            comunas.find('option').remove();
            comunas.append('<option value="">«Selecciona»</option>');
            $(data).each(function (i, v) { // indice, valor
                comunas.append('<option value="' + v.id + '">' + v.comuna + '</option>');
            });
        }
    });
});
function MayusPrimera(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
function regionSelect(tipo) {
    $.ajax({
        url: base.base_url + 'RegionComuna/cargarregion',
        type: 'POST',
        dataType: 'JSON',
        success: function (data) {
            var regiones = $("#region_" + tipo);
            regiones.find('option').remove();
            regiones.append('<option value="">«Selecciona»</option>');
            $(data).each(function (i, v) { // indice, valor
                regiones.append('<option value="' + v.id + '">' + v.region + '</option>');
            });
        }
    });
}
function razasSelect(tipo_mascota) {
    var data = "tipo=" + tipo_mascota;
    $.ajax({
        url: base.base_url + 'razas/cargarazas',
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            var razas = $("#raza");
            razas.find('option').remove();
            razas.append('<option value="">«Selecciona»</option>');
            razas.append('<option value="0">- Mestizo -</option>');
            $(data).each(function (i, v) { // indice, valor
                razas.append('<option value="' + v.id + '">' + v.raza + '</option>');
            });


        }
    });

}
function cargaImagen(img) {
    var formData = new FormData($('#formimg')[0]);
    formData.append('idImg', img);
    $.ajax({
        url: base.base_url + 'aviso/subirimagen',
        type: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $("#lbl" + img).css('background', 'url(../assets/img/loader.gif)');
            $("#lbl" + img).css('background-repeat', 'no-repeat');
            $("#lbl" + img).css('background-position', 'center');
            $("#img" + img).attr('disabled', 'disabled');
            $("#btnPublicar").attr('disabled', 'disabled');
        },
        success: function (datos)
        {
            console.log(datos);
            if (datos == "0") {
                alert("Error al subir imagen");
            } else {
                $("#btnPublicar").removeAttr('disabled');
                $("#imgVal" + img).val(datos);
                $("#lbl" + img).css('background', 'url(../uploaded/tmp_avisos/' + datos + ')');
                $("#lbl" + img).css('background-size', '100px');
                $("#lbl" + img).css('background-repeat', 'no-repeat');
                $("#lbl" + img).css('background-position', 'center');
                $("#lbl" + img).css('cursor', 'default');
                $("#lbl" + img).html('<div class="eliminarImgSubir" id="icondel' + img + '"  title="Eliminar"><img src="../assets/img/deleteImg.png" onclick="eliminarSubirImg(\'' + img + '\',\'' + datos + '\');" /></div>');
            }
        }
    });
}
function eliminarImgSubida(img) {
    $.ajax({
        url: base.base_url + 'aviso/eliminarimg',
        type: 'POST',
        data: {img: img}
    });

}
function eliminarSubirImg(idImg, img) {
    $("#lbl" + idImg).css('background', '#FFFFFF url(../assets/img/camera-icon.png)');
    $("#lbl" + idImg).css('background-repeat', 'no-repeat');
    $("#lbl" + idImg).css('background-position', 'center');
    $("#lbl" + idImg).css('cursor', 'pointer');
    $.ajax({
        url: base.base_url + 'aviso/eliminarimg',
        type: 'POST',
        data: {img: img}
    });
    $("#img" + idImg).val("");
    $("#icondel" + idImg).remove();
    $("#img" + idImg).removeAttr('disabled');
}
function inputsEmptyDefault() {
    if ($("#titulo").val() == "") {
        generaError('titulo', 'Ingrese un titulo para su aviso!');
        return true;
    } else if ($("#descripcion").val() == "") {
        generaError('descripcion', 'Ingrese una breve descripcion para su aviso!');
        return true;
    } else if ($("#region").val() == "") {
        generaError('region', 'Seleccione la region donde publicará su aviso!');
        return true;
    } else if ($("#comuna").val() == "") {
        generaError('comuna', 'Seleccione la comuna donde publicará su aviso!');
        return true;
    } else if ($("#tipomascota").val() == "") {
        generaError('tipomascota', 'Seleccione el tipo de mascota!');
        return true;
    } else if ($("#raza").val() == "") {
        generaError('raza', 'Seleccione la raza de la mascota!');
        return true;
    } else if ($("#genero").val() == "") {
        generaError('genero', 'Seleccione el genero de la mascota!');
        return true;
    }
    return false;
}
function publicarAviso() {
    $(".errorInputLogin").remove();
    if ($("#tipo_aviso").val() == "") {
        generaError('tipo_aviso', 'Seleccione el tipo de aviso a publicar');
    } else if ($("#tipo_aviso").val() == "encontrada") {
        if (inputsEmptyDefault()) {
            return;
        } else if ($("#fecha").val() == "") {
            generaError('fecha', 'Ingrese la fecha que encontró la mascota');
        } else {
            var datos = {
                tipoaviso: 'encontrada',
                titulo: $("#titulo").val(),
                tipomascota: $("#tipomascota").val(),
                raza: $("#raza").val(),
                genero: $("#genero").val(),
                fecha: $("#fecha").val(),
                region: $("#region").val(),
                comuna: $("#comuna").val(),
                lugar: $("#lugar").val(),
                descripcion: $("#descripcion").val(),
                img1: $("#imgVal1").val(),
                img2: $("#imgVal2").val(),
                img3: $("#imgVal3").val(),
                img4: $("#imgVal4").val(),
                img5: $("#imgVal5").val(),
                img6: $("#imgVal6").val()
            };
            enviaDatosPublicar(datos);
        }
    } else if ($("#tipo_aviso").val() == "desaparecida") {
        if (inputsEmptyDefault()) {
            return;
        } else if ($("#nombremascota").val() == "") {
            generaError('nombremascota', 'Ingrese el nombre de tu mascota desaparecida');
        } else if ($("#edad").val() == "") {
            generaError('edad', 'Ingrese la edad aprox. de la mascota');
        } else if ($("#fecha").val() == "") {
            generaError('fecha', 'Ingrese la fecha que desapareció su mascota');
        } else {
            var datos = {
                tipoaviso: 'desaparecida',
                titulo: $("#titulo").val(),
                nombremascota: $("#nombremascota").val(),
                tipomascota: $("#tipomascota").val(),
                raza: $("#raza").val(),
                genero: $("#genero").val(),
                edad: $("#edad").val(),
                fecha: $("#fecha").val(),
                region: $("#region").val(),
                comuna: $("#comuna").val(),
                lugar: $("#lugar").val(),
                descripcion: $("#descripcion").val(),
                img1: $("#imgVal1").val(),
                img2: $("#imgVal2").val(),
                img3: $("#imgVal3").val(),
                img4: $("#imgVal4").val(),
                img5: $("#imgVal5").val(),
                img6: $("#imgVal6").val()
            };
            enviaDatosPublicar(datos);
        }
    } else if ($("#tipo_aviso").val() == 'adopcion') {
        if (inputsEmptyDefault()) {
            return;
        } else if ($("#nombremascota").val() == "") {
            generaError('nombremascota', 'Ingrese el nombre de tu mascota');
        } else if ($("#edad").val() == "") {
            generaError('edad', 'Ingrese la edad aprox. de la mascota');
        } else {
            var datos = {
                tipoaviso: 'adopcion',
                titulo: $("#titulo").val(),
                nombremascota: $("#nombremascota").val(),
                tipomascota: $("#tipomascota").val(),
                raza: $("#raza").val(),
                genero: $("#genero").val(),
                edad: $("#edad").val(),
                region: $("#region").val(),
                comuna: $("#comuna").val(),
                descripcion: $("#descripcion").val(),
                img1: $("#imgVal1").val(),
                img2: $("#imgVal2").val(),
                img3: $("#imgVal3").val(),
                img4: $("#imgVal4").val(),
                img5: $("#imgVal5").val(),
                img6: $("#imgVal6").val()
            };
            enviaDatosPublicar(datos);
        }
    } else if ($("#tipo_aviso").val() == "adoptar") {
        if (inputsEmptyDefault()) {
            return;
        } else if ($("#edad").val() == "") {
            generaError('edad', 'Ingrese la edad aprox. de la mascota');
        } else {
            var datos = {
                tipoaviso: 'adoptar',
                titulo: $("#titulo").val(),
                tipomascota: $("#tipomascota").val(),
                raza: $("#raza").val(),
                genero: $("#genero").val(),
                edad: $("#edad").val(),
                region: $("#region").val(),
                comuna: $("#comuna").val(),
                descripcion: $("#descripcion").val(),
                img1: $("#imgVal1").val(),
                img2: $("#imgVal2").val(),
                img3: $("#imgVal3").val(),
                img4: $("#imgVal4").val(),
                img5: $("#imgVal5").val(),
                img6: $("#imgVal6").val()
            };
            enviaDatosPublicar(datos);
        }
    }
}
function enviaDatosPublicar(datos) {
    $.ajax({
        url: base.base_url + 'aviso/publicar',
        type: 'POST',
        data: datos,
        dataType: "json",
        success: function (data) {
            if (data == "1") {
                window.location.href = base.base_url + "aviso/nuevo";
            }
        }
    });
}
function generaError(input, texto) {
    $("#" + input).focus().after('<div id="err_' + input + '" class="errorInputLogin col-lg-10">' + texto + '</div>');
    $("." + input).addClass('has-error');
}
function removerError(input) {
    $("." + input).removeClass('has-error');
}
$(document).ready(function () {
    if ($("#tipo_aviso").val() == "") {
        removerErrorComun();
    }
    $("#tipo_aviso").change(function () {
        $(".tipo_aviso").removeClass('has-error');
        $(".errorInputLogin").remove();
        if ($(this).val() == "encontrada") {
            removerErrorComun();
        } else if ($(this).val() == "desaparecida") {
            removerErrorComun();
        } else if ($(this).val() == "adopcion") {
            removerErrorComun();
        } else if ($(this).val() == "adoptar") {
            removerErrorComun();
        }
    });

});
function removerErrorComun() {
    $("#titulo, #nombremascota, #edad, #descripcion").keyup(function () {
        if ($("#titulo").val() != "") {
            $(".titulo").removeClass('has-error');
            $("#err_titulo").remove();
        }
        if ($("#nombremascota").val() != "") {
            $(".nombremascota").removeClass('has-error');
            $("#err_nombremascota").remove();
        }
        if ($("#edad").val() != "") {
            $(".edad").removeClass('has-error');
            $("#err_edad").remove();
        }
        if ($("#descripcion").val() != "") {
            $(".descripcion").removeClass('has-error');
            $("#err_descripcion").remove();
        }
    });
    $("#tipomascota, #raza, #genero, #region, #comuna").change(function () {
        if ($("#tipomascota").val() != "") {
            $(".tipomascota").removeClass('has-error');
            $("#err_tipomascota").remove();
        }
        if ($("#raza").val() != "") {
            $(".raza").removeClass('has-error');
            $("#err_raza").remove();
        }
        if ($("#genero").val() != "") {
            $(".genero").removeClass('has-error');
            $("#err_genero").remove();
        }
        if ($("#region").val() != "") {
            $(".region").removeClass('has-error');
            $("#err_region").remove();
        }
        if ($("#comuna").val() != "") {
            $(".comuna").removeClass('has-error');
            $("#err_comuna").remove();
        }
    });
}
function buscarPor(texto, cat, regionSel) {
    var txtBuscar = $('#' + texto).val();
    var tipo_aviso = $("#" + cat).val();
    var region = $("#" + regionSel).val();
    var filtro = null;
    var reg = getRegiones(region);
    if (tipo_aviso == "" && txtBuscar == '') {
        window.location = base.base_url + "aviso/by/" + reg;
        return false;
    } else if (txtBuscar != '' && tipo_aviso == '') {
        window.location = base.base_url + "aviso/by/" + reg + "/null/" + txtBuscar;
        return false;
    } else if (txtBuscar == '' && tipo_aviso != '') {
        window.location = base.base_url + "aviso/by/" + reg + "/" + tipo_aviso;
        return false;
    } else {
        window.location = base.base_url + "aviso/by/" + reg + "/" + tipo_aviso+"/"+txtBuscar;
        return false;
    }
}
function getRegiones(reg) {
    switch (reg) {
        case '1':
            return 'arica_parinacota';
            break;
        case '2':
            return 'tarapaca';
            break;
        case '3':
            return 'antofagasta';
            break;
        case '4':
            return 'atacama';
            break;
        case '5':
            return 'coquimbo';
            break;
        case '6':
            return 'valparaiso';
            break;
        case '7':
            return 'metropolitana';
            break;
        case '8':
            return 'ohiggins';
            break;
        case '9':
            return 'maule';
            break;
        case '10':
            return 'biobio';
            break;
        case '11':
            return 'araucania';
            break;
        case '12':
            return 'losrios';
            break;
        case '13':
            return 'loslagos';
            break;
        case '14':
            return 'aisen';
            break;
        case '15':
            return 'magallanes';
            break;
        case '16':
            return 'chile';
            break;
        default:
            break;
    }
}