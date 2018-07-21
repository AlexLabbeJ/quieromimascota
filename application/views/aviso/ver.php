<script>
    var main = document.getElementById('main');
    main.style.backgroundColor = "#F1F1F1";
</script>
<div class="row">
    <?php
    $date = new DateTime($query->fecha_publicacion);
    ?>
    <div class="col-lg-11">
        <h1 class="centro text-center"><?= $query->titulo ?></h1>
    </div>
    <div class="col-lg-1">
        <span><?= $date->format('d/m/y') ?></span>
    </div>
</div>
<article class="row">
    <section class="col-lg-6 gal ">
        <div id="custom_carousel" class="carousel  slide" data-ride="carousel" data-interval="4000">
            <div class="carousel-inner content-shadow margin-bottom">
                <div class="item active">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="top col-md-12 col-xs-12">
                                <?php $can = count($imagenes); ?>
                                <img <?= $can > 0 ? "src='../../../uploaded/img_avisos/" . $imagenes[0]->url . "' class='img-responsive'" : "src='" . base_url() . "assets/img/sin_img.png' class='img-center img-responsive'" ?> >
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if ($can > 0):
                    for ($i = 1; $i < $can; $i++) {
                        ?>
                        <div class="item">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="top col-md-6 col-xs-12">
                                        <img src="../../../uploaded/img_avisos/<?= $imagenes[$i]->url ?>" class="img-responsive">
                                    </div>
                                </div>
                            </div>            
                        </div>
                        <?php
                    }
                endif;
                ?>
            </div>
            <?php if ($can > 0): ?>
                <a data-slide="prev" href="#custom_carousel" class="izq carousel-control">‹</a>
                <a data-slide="next" href="#custom_carousel" class="der carousel-control">›</a>
            <?php endif; ?>
            <div class="controls content-shadow draggable ui-widget-content col-md-12 col-xs-12">
                <?php if ($can > 0): ?>
                    <ul class="nav  ui-widget-header">
                        <li data-target="#custom_carousel" data-slide-to="0" class="active">
                            <a href="#"><img src="../../../uploaded/img_avisos/<?= $imagenes[0]->url ?>"></a>
                        </li>
                        <?php
                        for ($i = 1; $i < $can; $i++) {
                            ?>
                            <li data-target="#custom_carousel" data-slide-to="<?= $i ?>">
                                <a href="#"><img src="../../../uploaded/img_avisos/<?= $imagenes[$i]->url ?>"></a>
                            </li>
                            <?php
                        }
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </section>
    <section class="col-lg-4 col-lg-push-1">
        <div class="datos">
            <div class="row content-shadow">
                <table class="table table-condensed table-striped table-hover tabla-articulo">
                    <caption class="fondo-titulo-articulo">Datos del propietario del aviso</caption>
                    <tbody>
                        <tr>
                            <td>Nombre del propietario</td>
                            <td><?= $query->nombre_usuario . ' ' . $query->apellidos ?></td>
                        </tr>
                        <tr>
                            <td>Celular</td>
                            <td><?= $query->numero_celular ?></td>
                        </tr>
                        <tr>
                            <td>Numero fijo</td>
                            <td><?= $query->numero_fijo ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row content-shadow">
                <table class="table table-condensed table-striped table-hover tabla-articulo">
                    <caption class="fondo-titulo-articulo">Datos del aviso</caption>
                    <tbody>
                        <tr>
                            <td>Tipo de mascota</td>
                            <td><?= $query->tipo_mascota ?></td>
                        </tr>
                        <tr>
                            <td>Genero</td>
                            <td><?= $query->genero == 1 ? 'Macho' : 'Hembra' ?></td>
                        </tr>
                        <tr>
                            <td>Raza</td>
                            <td><?= $query->raza ?></td>
                        </tr>
                        <?php if ($query->tipoaviso == '3' || $query->tipoaviso == '2'): ?>
                            <tr>
                                <td>Nombre</td>
                                <td><?= $query->nombre ?></td>
                            </tr>
                            <tr>
                                <td>Edad</td>
                                <td><?= $query->edad ?></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</article>
<section class="row">
    <div class="col-lg-7" >
        <div class="content-shadow">
            <h4>Descripcion</h4>
            <div class="text-justify">
                <?= $query->descripcion ?>
            </div> 
        </div>
    </div>
</section>
<div class="row">
    <div class="col-lg-7">
        <div class="content-shadow">
            <div class="col-lg-12 ">
                <h4>Comenta</h4>
            </div>
            <div class="col-lg-12 input-group">
                <textarea class="form-control" id="caja_comentario" type="text" name="comentario" draggable="false"></textarea>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-lg-push-6">
        <button class="btn-success btn">Comenta</button>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="comentarios fondo-ver">
            <div>

            </div>            
        </div>
    </div>
</div>
<script>
    $(document).ready(() => {
        $('#caja_comentario').on('focus', () => {

        });
    });
</script>

