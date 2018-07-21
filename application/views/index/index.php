<a href="<?= base_url(); ?>aviso/nuevo" class="btn-publicar btn">Publica tu aviso!</a><br><br>
<div class="panel panel-default">
    <div class="panel-heading">Ultimos avisos</div>
    <div class="panel-body">
    <?php
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
        ?>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">Avisos por categoria</div>
    <div class="panel-body">
        <div id="panel_cat_index" class="btn-group btn-group-justified">
          <a href="<?= base_url()?>aviso/by/chile/encontrada" class="btn btn-primary">Mascota Encontrada</a>
          <a href="<?= base_url()?>aviso/by/chile/desaparecida" class="btn btn-primary">Mascota Desaparecida</a>
          <a href="<?= base_url()?>aviso/by/chile/adopcion" class="btn btn-primary">Dar en adopción</a>
          <a href="<?= base_url()?>aviso/by/chile/adoptar" class="btn btn-primary">Adoptar una mascota</a>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">Avisos por región</div>
    <div class="panel-body">
        <ul class="regionList col-lg-12">
            <li>
                <a href="<?= base_url()?>aviso/by/chile" id="a1" class="link"><span class="icon-region" id="i1">CL</span>En todo Chile</a>
            </li>
            <li>
                <a href="<?= base_url()?>aviso/by/metropolitana" id="a5" class="link"><span class="icon-region" id="i5">RM</span>Metropolitana</a>
            </li>
            <li>
                <a href="<?= base_url()?>aviso/by/arica_parinacota" id="a9" class="link"><span class="icon-region" id="i9">XV</span>Arica y Parinacota</a>
            </li>
            <li>
                <a href="<?= base_url()?>aviso/by/tarapaca" id="a13" class="link"><span class="icon-region" id="i13">I</span>Tarapacá</a>
            </li>
            <li>
                <a href="<?= base_url()?>aviso/by/antofagasta" id="a2" class="link"><span class="icon-region" id="i2">II</span>Antofagasta</a>
            </li>
            <li>
                <a href="<?= base_url()?>aviso/by/atacama" id="a6" class="link"><span class="icon-region" id="i6">III</span>Atacama</a>
            </li>
            <li>
                <a href="<?= base_url()?>aviso/by/coquimbo" id="a10" class="link"><span class="icon-region" id="i10">VI</span>Coquimbo</a>
            </li>
            <li>
                <a href="<?= base_url()?>aviso/by/valparaiso" id="a14" class="link"><span class="icon-region" id="i14">V</span>Valparaíso</a>
            </li>
            <li>
                <a href="<?= base_url()?>aviso/by/ohiggins" id="a3" class="link"><span class="icon-region" id="i3">VI</span>O'Higgins</a>
            </li>
            <li>
                <a href="<?= base_url()?>aviso/by/maule" id="a7" class="link"><span class="icon-region" id="i7">VII</span>Maule</a>
            </li>
            <li>
                <a href="<?= base_url()?>aviso/by/biobio" id="a11" class="link"><span class="icon-region" id="i11">VIII</span>Biobío</a>
            </li>
            <li>
                <a href="<?= base_url()?>aviso/by/araucania" id="a15" class="link"><span class="icon-region" id="i15">IX</span>Araucanía</a>
            </li>
            <li>
                <a href="<?= base_url()?>aviso/by/losrios" id="a4" class="link"><span class="icon-region" id="i4">XIV</span>Los Ríos</a>
            </li>
            <li>
                <a href="<?= base_url()?>aviso/by/loslagos" id="a8" class="link"><span class="icon-region" id="i8">X</span>Los Lagos</a>
            </li>
            <li>
                <a href="<?= base_url()?>aviso/by/aisen" id="a12" class="link"><span class="icon-region" id="i12">XI</span>Aisén</a>
            </li>
            <li>
                <a href="<?= base_url()?>aviso/by/magallanes" id="a16" class="link"><span class="icon-region" id="i16">XII</span>Magallanes y Antártica</a>
            </li>
        </ul>
    </div>
</div>
