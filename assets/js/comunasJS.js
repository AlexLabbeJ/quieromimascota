$(document).ready(function () {
    $("#region").change(function () {
        $("#comuna").empty();
        $("#comuna").html('<option value="" id="select_comuna">«Selecciona»</option>');
        var id = 'value=' + $("#region").val();
        $.ajax({
            url: base.base_url+'RegionComuna/cargarcomunas',
            type: 'POST',
            data: id,
            success: function (response) {
                var obj = eval(response);
                for (var i = 0; i < obj.length; i++) {
                    $("#select_comuna").after('<option value="' + obj[i]['id'] + '">' + obj[i]['comuna'] + '</option>');
                }

            }
        });
    });
});