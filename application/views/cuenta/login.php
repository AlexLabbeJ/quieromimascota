<form id="form_login_no_modal" class="form-horizontal well">
    <fieldset>
        <div class="form-group row">
            <label class="control-label col-lg-3">E-Mail</label>
            <div class="col-lg-8 input-group email">
                <span class="input-group-addon input-sm"><span class="glyphicon glyphicon-envelope"></span></span>
                <input type="email" id="emailLoginNoModal" class="form-control"  name="email">
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-lg-3">Contraseña</label>
            <div class="col-lg-8 input-group password ">
                <span class="input-sm input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                <input type="password" id="passwordLoginNoModal" class="form-control"  name="password">
            </div>
        </div>
        <div class="form-group pull-right row">
            <label class="control-label col-lg-3"></label>
            <div class="col-lg-8">
                <input type="button" class="btnForm" id="btnLoginNoModal" onclick="login('btnLoginNoModal','emailLoginNoModal','passwordLoginNoModal','form_login_no_modal');" value="Iniciar Sesión">
            </div>
        </div>
    </fieldset>
</form>

