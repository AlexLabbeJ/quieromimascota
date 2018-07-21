<div class="div-form">
    <div class="reg-header">
        <h2 class="col-lg-offset-1 title-reg">Registrar</h2>
        <input type="hidden" id="urlActual" value="<?= "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>">
        <div class="stepwizard col-md-offset-3">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a onclick="step(1, 'step-1')" type="button" id="step-1" class="btn btn-primary btn-circle" style="background-color: #04151f;">
                        <span class="glyphicon glyphicon-user"></span>
                    </a>
                    <p>Sobre ti</p>
                </div>
                <div class="stepwizard-step">
                    <a onclick="step(2, 'step-2')" type="button" id="step-2" class="btn btn-default btn-circle" disabled="disabled">
                        <span class="glyphicon glyphicon-map-marker"></span>
                    </a>
                    <p>Tu ubicación</p>
                </div>
                <div class="stepwizard-step">
                    <a onclick="step(3, 'step-3')" type="button" id="step-3" class="btn btn-default btn-circle" disabled="disabled">
                        <span class="glyphicon glyphicon-th-list"></span>
                    </a>
                    <p>Tu cuenta</p>
                </div>
            </div>
        </div>
    </div>
    <div class="reg-body">
        <form action="http://localhost/quieromimascota/cuenta/registrar" method="post" autocomplete="off" class="form-horizontal">
            <fieldset>
                <div id="paso-1" class="">
                    <div class="form-group" >
                        <label class="control-label col-md-3 col-lg-3 col-xs-3 col-sm-3">Nombre</label>
                        <div class="col-lg-6 col-md-6 col-sm-6 input-group col-xs-12" id="group-nombre">
                            <input type="text" id="nombre" class="form-control"  name="nombre" value="<?= set_value('nombre') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-lg-3 col-xs-3 col-sm-3">Apellidos</label>
                        <div class="col-lg-6 col-md-6 col-sm-6 input-group col-xs-12" id="group-apellidos">
                            <input type="text" id="apellidos" class="form-control"  name="apellidos" value="<?= set_value('apellidos') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-lg-3 col-xs-3 col-sm-3">Numero Celular</label>
                        <div class="col-lg-6 col-md-6 col-sm-6 input-group col-xs-12" id="group-num_celular">
                            <span class="input-group-addon">+56</span>
                            <input type="tel" id="num_celular" class="form-control" maxlength="15" name="num_celular" value="<?= set_value('num_celular') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-lg-3 col-xs-3 col-sm-3">Numero Fijo</label>
                        <div class="col-lg-6 col-md-6 col-sm-6 input-group col-xs-12" id="group-num_fijo">
                            <input type="tel" id="num_fijo" class="form-control" maxlength="15" name="num_fijo" value="<?= set_value('num_fijo') ?>">    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-lg-3 col-xs-3 col-sm-3"></label>
                        <div class="col-lg-6 col-md-6 col-sm-6 input-group col-xs-12">  
                            <button class="btn btn-primary nextBtn pull-right" onclick="step(2, 'next-1')" id='next-1' type="button" >Siguiente</button>
                        </div>
                    </div>
                </div>
                <div id="paso-2" class="hidden">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-lg-3 col-xs-3 col-sm-3">Region</label>
                        <div class="col-lg-6 col-md-6 col-sm-6 input-group col-xs-12" id="group-region">
                            <select name="region" id="region" class="form-control">
                                <option value="">«Selecciona»</option>
                                <?php
                                foreach ($query as $value) {
                                    ?>
                                    <option value="<?= $value->id ?>" <?= set_value("region") == $value->id ? "selected" : "" ?>><?= $value->region ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-lg-3 col-xs-3 col-sm-3">Comuna</label>
                        <div class="col-lg-6 col-md-6 col-sm-6 input-group col-xs-12" id="group-comuna">
                            <select name="comuna" id="comuna" class="form-control ">
                                <option value="" id="select_comuna">«Selecciona»</option>
                                <?php if (isset($comuna)) { ?>
                                    <?php foreach ($comuna as $item): ?>
                                        <option value="<?= $item->id ?>"<?= set_value("comuna") == $item->id ? "selected" : "" ?>><?= $item->comuna ?></option>
                                        <?php
                                    endforeach;
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-lg-3 col-xs-3 col-sm-3"></label>
                        <div class="col-lg-6 col-md-6 col-sm-6 input-group col-xs-12">
                            <button class="btn btn-primary nextBtn pull-right" onclick="step(3, 'next-3')" id='next-3' type="button" >Siguiente</button>
                        </div>
                    </div>
                </div>
                <div id="paso-3" class="hidden">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-lg-3 col-xs-3 col-sm-3">Correo Electronico</label>
                        <div class="col-lg-6 col-md-6 col-sm-6 input-group col-xs-12" id="group-email">
                            <input type="email" id="email" class="form-control" name="email" value="<?= set_value('email') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-lg-3 col-xs-3 col-sm-3">Repetir Correo Electronico</label>
                        <div class="col-lg-6 col-md-6 col-sm-6 input-group col-xs-12" id="group-email2">
                            <input type="email" id="email2" class="form-control" name="email2" value="<?= set_value('email2') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-lg-3 col-xs-3 col-sm-3">Contraseña</label>
                        <div class="col-lg-6 col-md-6 col-sm-6 input-group col-xs-12" id="group-password">
                            <input type="password" id="password" class="form-control" name="password" value="<?= set_value('password') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-lg-3 col-xs-3 col-sm-3">Repetir Contraseña</label>
                        <div class="col-lg-6 col-md-6 col-sm-6 input-group col-xs-12" id="group-password2">
                            <input type="password" id="password2" class="form-control" name="password2" value="<?= set_value('password2') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-lg-3 col-xs-3 col-sm-3"></label>
                        <div class="col-lg-6 col-md-6 col-sm-6 input-group col-xs-12">
                            <input type="submit" class="btnForm" id="re" value="Registrarme" >
                        </div>
                    </div>
                </div>
                <?= isset($error) ? $error : "" ?>
                <?php
                if (!isset($error)) {
                    echo "<script>
                $('.tooltip').focus().tooltip({
                    position: {my: 'left+15 center', at: 'right center'}
                });
            </script>";
                }
                ?>
            </fieldset>
        </form>
    </div>
</div>
