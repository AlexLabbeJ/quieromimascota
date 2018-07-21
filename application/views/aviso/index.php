
<div class="row">
    <?php
    foreach ($aviso as $val):
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
            <div class="thumbnail linkAvisoIndex" style="border: 1px solid #1F8A70;color: #FFFFFF;" onclick="location.href = '<?= base_url(); ?>aviso/ver/<?= $val->id; ?>/<?=$val->tipoaviso?>'">
                <div class="well well-sm" style="background: #1F8A70;margin-bottom: 5px;">
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
                        <?php if ($val->tipoaviso == "adopcion") { ?>
                            Mascota en <?= $val->tipoaviso; ?>
                        <?php } else if ($val->tipoaviso == "adoptar") { ?>
                            Mascota para <?= $val->tipoaviso; ?>
                        <?php } else { ?>
                            Mascota <?= $val->tipoaviso; ?>
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
    <?php endforeach; ?>
</div>
