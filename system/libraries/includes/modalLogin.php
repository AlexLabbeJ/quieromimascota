<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <span class="title">Iniciar Sesión</span>
        </div>
        <div class="modal-body">
            <form id="form_login" class="form-horizontal">
                <fieldset>
                    <div class="form-group">
                        <label class="control-label col-lg-3">E-Mail</label>
                        <div class="col-lg-8 input-group email">
                            <span class="input-group-addon input-sm"><span class="glyphicon glyphicon-envelope"></span></span>
                            <input type="email" id="emailLogin" class="form-control"  name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Contraseña</label>
                        <div class="col-lg-8 input-group password">
                            <span class="input-sm input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" id="passwordLogin" class="form-control"  name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3"></label>
                        <div class="col-lg-8">
                            <input type="hidden" id="urlActual" value="<?php echo "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>">
                            <input type="button" class="btnForm" id="btnLogin" onclick="login('btnLogin','emailLogin','passwordLogin');" value="Iniciar Sesión">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

</div>