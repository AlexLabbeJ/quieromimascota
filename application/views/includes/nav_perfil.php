<script>
    $(document).ready(function () {
        $('.btn-perfil').click(function () {
            if (window.location.href !== $(this).data('href')) {
                $('#content-perfil').load($(this).data('href'));
                history.pushState(null, '', $(this).data('href'));
                $('.btn-perfil').removeClass('active');
                document.title=$(this).data('value');
                $(this).addClass('active');
            }
        });
        $(".btn-perfil[data-href='" + window.location.href + "']").addClass('active');
    });
</script>
<div class="row">
    <div class="col-lg-4">
        <div class="list-group">
            <a data-value='Inicio' data-href="<?= base_url() ?>cuenta" class="btn-perfil list-group-item"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Inicio</a>
            <a data-value='Mis avisos' data-href="<?= base_url() ?>cuenta/avisos" class="btn-perfil list-group-item"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Mis Avisos</a>
            <a data-value='Perfil' data-href="<?= base_url() ?>cuenta/mi_perfil" class="btn-perfil list-group-item"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Perfil</a>
            <a data-value='Seguridad' data-href="<?= base_url() ?>cuenta/cambiarpass" class="btn-perfil list-group-item"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Seguridad</a>
        </div>
    </div>
    <div class="col-lg-8" id="content-perfil">
