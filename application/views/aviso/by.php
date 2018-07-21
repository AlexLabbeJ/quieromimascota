<div class="row">
    <script>
        console.log("<?= $q ?>");
    </script>
    <div class="col-lg-12">
        <div class="panel panel-primary visible-xs visible-sm">
            <div class="panel-heading">
                <h3 class="panel-title">Buscar aviso por:</h3>
            </div>
            <div class="panel-body">
                <form class="form-inline" role="form">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="txtBuscar">Palabra clave: </label>
                            <input class="form-control input-sm" value="<?=$text?>" type="text" id="txtBuscar" name="txtBuscar">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="tipo_avisoBuscar">Tipo de aviso: </label>
                            <select class="form-control input-sm" id="tipo_avisoBuscar" name="tipo_avisoBuscar">     
                                <option value="">«Seleccione»</option>
                                <?php foreach ($tipo_aviso as $tipo => $value): ?>
                                    <option value="<?= $tipo ?>" <?= isset($getTipoAviso) ? $getTipoAviso == $tipo ? 'selected' : '' : '' ?>><?= $value ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="regionBuscar">Región: </label>
                            <select class="form-control input-sm" id="regionBuscar" name="regionBuscar" style="width: 70%;">
                                <?php foreach ($regiones as $numero => $region): ?>
                                    <option value="<?= $numero ?>" <?= isset($getRegion) ? $getRegion == $numero ? 'selected' : '' : '' ?>><?= $region ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="form-group">
                            <input type="button" class="btn btn-primary btn-sm" onclick="buscarPor('txtBuscar','tipo_avisoBuscar','regionBuscar');" id="btnBuscar" value="Buscar">
                        </div>
                </form>
            </div>
        </div>
    </div>
    <?php if ($aviso == "0") { ?>
        <div class="col-lg-12">
            <div class="alert alert-danger">
                <center><strong>No se han encontrado avisos de acuerdo a tu busqueda, intenta con otro tipo de busqueda!</strong></center>
            </div>
        </div>
        <?php
    } else {
        foreach ($aviso as $val) {
            list($width, $height) = getimagesize(base_url() . "uploaded/img_avisos/" . $val->img);
            if ($val->img == "") {
                $img = base_url() . "assets/img/sin_img.png";
            } else {
                $img = base_url() . "uploaded/img_avisos/" . $val->img;
            }
            if ($val->nom_region == "RM Metropolitana de Santiago") {
                $reg = "RM Metropolitana";
            } else if ($val->nom_region == "VI Libertador General Bernardo O'Higgins") {
                $reg = "VI O'Higgins";
            } else if ($val->nom_region == "XI Aisén del General Carlos Ibáñez del Campo") {
                $reg = "XI Aisén";
            } else if ($val->nom_region == "XII Magallanes y de la Antártica Chilena") {
                $reg = "XII Magallanes";
            } else {
                $reg = $val->nom_region;
            }
            ?>

            <div class="col-lg-3">
                <div class="thumbnail linkAvisoIndex" style="border: 1px solid #1F8A70;color: #FFFFFF;" onclick="location.href = '<?= base_url(); ?>aviso/ver/<?= $val->id . "/" . $val->tipoaviso; ?>'">
                    <div class="well well-sm" style="background: #1F8A70;margin-bottom: 5px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;">
                        <div class="titleAviso"><?= $val->titulo; ?></div>
                    </div>
                    <center style="margin-bottom: 5px;"><span class="label label-success"><?= $controller->horas($val->fecha_publicacion); ?></span></center>
                    <div class="imgContAviso">
                        <?php if ($width > $height) { ?>
                            <img src="<?= $img; ?>" width="200" style="position:relative;top: 50%;left: 50%;transform: translate(-50%, -50%);">
                        <?php } else if ($height > $width) { ?>
                            <img src="<?= $img; ?>" height="200" style="position:relative;top: 50%;left: 50%;transform: translate(-50%, -50%);">
                        <?php } else { ?>
                            <img src="<?= $img; ?>" width="200" height="200" style="position:relative;top: 50%;left: 50%;transform: translate(-50%, -50%);">
                        <?php } ?>
                    </div>

                    <div class="well well-sm" style="background: #EBF2FA;font-weight: bold;margin-top: 5px;color: #000000;">
                        <center>
                            <?php if ($val->tipoaviso == 'encontrada') { ?>
                                Mascota Encontrada
                            <?php } else if ($val->tipoaviso == 'desaparecida') { ?>
                                Mascota Desaparecida
                            <?php } else if ($val->tipoaviso == 'adopcion') { ?>
                                Mascota en adopcion
                            <?php } else { ?>
                                Adoptar mascota
                            <?php } ?>
                        </center>
                    </div>
                    <div class="caption" style="font-size: 13px;">
                        <fieldset>
                            <div class="form-group">
                                <label class="control-label col-lg-6">Región</label>
                                <div class="col-lg-6 input-group ">
                                    <div><?= $reg; ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-6">Comúna</label>
                                <div class="col-lg-6 input-group ">
                                    <div><?= $val->nom_comuna; ?></div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>
