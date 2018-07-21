    <?php
    $nombre = $datosUser->nombre;
    $apellido = $datosUser->apellidos;
    $region = $datosUser->region_id;
    $comu = $datosUser->comuna_id;
    $num_celu = $datosUser->numero_celular;
    $num_fijo = $datosUser->numero_fijo;
    ?> 
    <h2 id="h2">Modificar perfil</h2>
    <div class="well bs-component">
        <form id="form_update" class="form-horizontal">
            <fieldset>
                <div class="form-group">
                    <label class="control-label col-lg-3">Nombre</label>
                    <div class="col-lg-6">
                        <input type="text" id="nombre_user" class="form-control input-sm"  name="nombre_user" value="<?= $nombre; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3">Apellidos</label>
                    <div class="col-lg-6">
                        <input type="text" id="apellidos_user" class="form-control input-sm"  name="apellidos_user" value="<?= $apellido; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3">Numero Celular</label>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-addon">+56</span>
                            <input type="tel" id="numcelu_user" class="form-control input-sm" maxlength="15" name="numcelu_user" value="<?= $num_celu; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3">Numero Fijo</label>
                    <div class="col-lg-6">
                        <input type="tel" id="numfijo_user" class="form-control input-sm" maxlength="15" name="numfijo_user" value="<?= $num_fijo; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3">Region</label>
                    <div class="col-lg-6">
                        <select name="region_user" id="region_user" class="form-control input-sm">
                            <option value="">«Selecciona»</option>
                            <?php foreach ($query as $value): ?>
                                <option value="<?= $value->id; ?>" <?php if ($value->id == $region) echo 'selected'; ?> ><?= $value->region; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3">Comuna</label>
                    <div class="col-lg-6">
                        <select name="comuna_user" id="comuna_user" class="form-control input-sm">
                            <option value="" id="select_comuna">«Selecciona»</option>
                            <?php foreach ($datosComuna as $comuna): ?>
                                <option value="<?= $comuna->id; ?>" <?= $comuna->id == $comu ? 'selected' : ""; ?> ><?= $comuna->comuna; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3"></label>
                    <div class="col-lg-6">
                        <input type="button" onclick="actualizarUsuario()" class="btnForm" name="" value="Guardar cambios">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    </div>
    </div>
