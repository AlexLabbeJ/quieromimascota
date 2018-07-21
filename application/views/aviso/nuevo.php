<?php if ($this->session->has_userdata("id")): ?>
    <h2>Publicar Nuevo Aviso</h2>
    <div class="well bs-component">
        <form id="formimg" enctype="multipart/form-data" type="POST" class="form-horizontal">
            <fieldset>
                <?php if (isset($_COOKIE["publicado"])): ?>
                    <div class="alert alert-dismissible alert-success" id="publicado">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Felicidades!</strong> tu aviso ya ha sido publicado correctamente</a>.
                    </div>
                <?php endif; ?>
                <legend id="legend"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;
                    &nbsp;
                    Información del Aviso</legend>
                <hr>
                <div class="form-group" id="div_tipo_aviso">
                    <legend>Datos del Aviso</legend>
                    <div class="form-group">
                        <label for="tipo_aviso" class="control-label col-lg-2">Tipo de aviso</label>
                        <div class="col-lg-4">
                            <select class="form-control input-sm" id="tipo_aviso" name="tipo_aviso" class="">
                                <option value="">«Seleccione»</option>
                                <option value="encontrada">Mascota encontrada</option>
                                <option value="desaparecida">Mascota desaparecida</option>
                                <option value="adopcion">Dar en adopción</option>
                                <option value="adoptar">Adoptar mascota</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group" id="div_titulo">
                    <label for="tipo_aviso" class="control-label col-lg-2">Titulo</label>
                    <div class="col-lg-4 input-group-sm titulo" id="group_titulo">
                        <input class="form-control input-sm" type="text" id="titulo" name="titulo">
                    </div>
                </div>
                <div class="form-group" id="div_descripcion">
                    <label for="tipo_aviso" class="control-label col-lg-2">Descripción</label>
                    <div class="col-lg-4 input-group-row descripcion">
                        <textarea rows="6" placeholder="Escribe una breve descripcion para tu aviso..." class="form-control input-sm" style="resize:none;" id="descripcion" name="descripcion"></textarea>
                    </div>
                </div>

                <div class="form-group" id="div_fotos">
                    <label for="tipo_aviso" class="control-label col-lg-2">Fotos (6 max.)</label>
                    <div class="col-lg-8">
                        <?php
                        for ($i = 1; $i < 7; $i++):
                            echo '<input type="file" id="img' . $i . '" name="imgUp' . $i . '" accept="image/*" class="inputFileImg form-control"><label id="lbl' . $i . '" for="img' . $i . '"></label>
                            <input type="hidden" name="idImg" value="' . $i . '"><input type="hidden" id="imgVal' . $i . '" value="">';
                        endfor;
                        ?>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="well bs-component">
        <form class="form-horizontal">
            <fieldset>
                <legend><span class="glyphicon glyphicon-map-marker"></span>&nbsp;
                    &nbsp;
                    Ubicación de tu aviso</legend>
                <hr>
                <div class="form-group" id="div_region">
                    <label class="control-label col-lg-2">Región</label>
                    <div class="col-lg-4 input-group-sm region">
                        <select class="form-control input-sm" id="region" name="region">
                            <option value="">«Seleccione»</option>
                            <?php foreach ($region as $item): ?>
                                <option value="<?= $item->id ?>" <?= $item->id == $region_usuario->region_id ? ' selected' : '' ?>><?= $item->region ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" id="div_comuna">
                    <label class="control-label col-lg-2">Comuna</label>
                    <div class="col-lg-4 input-group-sm comuna">
                        <select name="comuna" id="comuna" class="form-control input-sm">
                            <option value="" id="option_comuna">«Seleccione»</option>
                            <?php foreach ($comunas_usuario as $item): ?>
                                <option value="<?= $item->id ?>" <?= $item->id == $region_usuario->comuna_id ? ' selected' : '' ?>><?= $item->comuna ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="well bs-component">
        <form class="form-horizontal">
            <fieldset>
                <legend><span class="glyphicon glyphicon-tags"></span>&nbsp;
                    &nbsp;
                    Información de la mascota</legend>
                <hr>
                <div class="form-group" id="div_tipomascota">
                    <label class="control-label col-lg-2">Tipo de mascota</label>
                    <div class="col-lg-4 input-group-sm tipomascota">
                        <select class="form-control input-sm" id="tipomascota" name="tipomascota">
                            <option value="">«Seleccione»</option>
                            <option value="Perro">Perro</option>
                            <option value="Gato">Gato</option>
                            <option value="Otros">Otros</option>
                        </select>
                    </div>
                </div>
                <div class="form-group" id="div_raza">
                    <label class="control-label col-lg-2">Raza</label>
                    <div class="col-lg-4 input-group-sm raza">
                        <select name="raza" id="raza" class="form-control input-sm">
                            <option value="">«Seleccione»</option>
                        </select>
                    </div>
                </div>
                <div class="form-group" id="div_genero">
                    <label class="control-label col-lg-2">Genero</label>
                    <div class="col-lg-4 input-group-sm genero">
                        <select name="genero" id="genero" class="form-control input-sm">
                            <option value="">«Seleccione»</option>
                            <option value="1">Hembra</option>
                            <option value="2">Macho</option>
                        </select>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="well bs-component">
        <form class="form-horizontal">
            <fieldset>
                <legend><span class="glyphicon glyphicon-user"></span>&nbsp;
                    &nbsp;
                    Tus información</legend>
                <hr>
                <?php
                $nombre_usuario = $_SESSION["nameUser"] . " " . $_SESSION["apellido"];
                $email = $_SESSION["emailUser"];
                $telefono = $_SESSION["telefono"];
                ?>
                <div class="form-group">
                    <label class="control-label col-lg-2">Nombre</label>
                    <div class="col-lg-4">
                        <input type="text" id="nombre_usuario" class="form-control input-sm" value="<?= $nombre_usuario ?>" disabled="disabled">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Correo Electronico</label>
                    <div class="col-lg-4">
                        <input type="email" id="email_usuario" class="form-control input-sm"  value="<?= $email; ?>" disabled="disabled">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Telefono</label>
                    <div class="col-lg-4">
                        <input type="text" id="telefono_usuario" class="form-control input-sm"  value="<?= $telefono; ?>">
                    </div>
                </div>
                <div class="form-group"><div class="col-lg-10 col-lg-offset-2"><input type="button" class="btnForm" id="btnPublicar" onclick="publicarAviso();" value="Publicar Aviso"></div></div>
            </fieldset>
        </form>
    </div>
    <?php
else :
    require_once (BASEPATH . 'libraries/includes/nologin.php');
endif;
