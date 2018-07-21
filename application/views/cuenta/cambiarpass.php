    <h2 id="h2">Cambiar contraseña</h2>
    <div class="well bs-component">
        <form id="form_cambiarpass" class="form-horizontal">
            <fieldset>
                <div class="form-group">
                    <label class="control-label col-lg-4">Contraseña actual</label>
                    <div class="col-lg-6 input-group ">
                        <span class="input-sm input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" id="passactual_user" class="form-control input-sm"  name="passactual_user">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-4">Contraseña nueva</label>
                    <div class="col-lg-6 input-group ">
                        <span class="input-sm input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" id="passnueva1_user" class="form-control input-sm"  name="passnueva1_user">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-4">Repetir Contraseña nueva</label>
                    <div class="col-lg-6 input-group ">
                        <span class="input-sm input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" id="passnueva2_user" class="form-control input-sm"  name="passnueva2_user">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-4"></label>
                    <div class="col-lg-6">
                        <input type="button" id="btnCambiarPass" onclick="cambiarPass()" class="btnForm" value="Cambiar Contraseña">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
