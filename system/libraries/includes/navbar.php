<?php
$tipo_aviso = array(
    'encontrada' => 'Mascota encontrada',
    'desaparecida' => 'Mascota desaparecida',
    'adopcion' => 'Dar en adopción',
    'adoptar' => 'Adoptar mascota'
);
$regiones = array(
    '16' => 'Todo Chile',
    '1' => 'XV Arica y Parinacota',
    '2' => 'I Tarapacá',
    '3' => 'II Antofagasta',
    '4' => 'III Atacama',
    '5' => 'IV Coquimbo',
    '6' => 'V Valparaiso',
    '7' => 'RM Metropolitana de Santiago',
    '8' => 'VI O\'Higgins',
    '9' => 'VII Maule',
    '10' => 'VIII Biobío',
    '11' => 'IX La Araucanía',
    '12' => 'XIV Los Ríos',
    '13' => 'X Los Lagos',
    '14' => 'XI Aisén',
    '15' => 'XII Magallanes y Antártica'
);
?>

<div class="navbar-more-overlay"></div>
<nav class="navbar navbar-inverse navbar-fixed-top animate" role="navigation">
    <div class="container-fluid navbar-more visible-xs">
        <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <div class="input-group">
                    <input type="text"  class="form-control input-sm" placeholder="Buscar...">
                    <span class="input-group-btn">
                        <button class="btn btn-buscar" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>
        </form>
        <ul class="nav navbar-nav">
            <?php if (!isset($_SESSION["emailUser"])): ?>
                <li>
                    <a class="btn-login-header text-black" c onclick="registrar();">
                        <span class="menu-icon glyphicon glyphicon-info-sign"></span>
                        <span class="text-black">&nbsp;
                            &nbsp;
                            Registrar
                        </span>
                    </a>
                </li>
                <li>
                    <a class="btn-login-header text-black" href="<?= base_url() ?>/cuenta/login">
                        <span class="menu-icon glyphicon glyphicon-log-in"></span>
                        <span class="text-black">&nbsp;
                            &nbsp;
                            Ingresar
                        </span>
                    </a>
                </li>
            <?php endif; ?>
            <li>
                <a href="#" class="">
                    <span class="menu-icon glyphicon glyphicon-phone-alt    "></span>
                    <span class="text-black">Contacto</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="menu-icon glyphicon glyphicon-info-sign"></span>
                    <span class="text-black">Sobre nosotros</span>
                </a>
            </li>

            <?php if (isset($_SESSION["emailUser"])): ?>
                <li>
                    <a href="javascript:logout();">
                        <span class="menu-icon glyphicon glyphicon-log-out"></span>
                        <span class="text-black">Salir</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="navbar-header hidden-xs hidden-sm hidden-md">
            <a class="navbar-brand" href="<?= base_url() ?>">Quiero Mi mascota</a>
        </div>
        <form id="form_buscar" onsubmit="return buscarPor('buscar', 'tipo_aviso_buscar_nav', 'region_buscar_nav')" class="navbar-form navbar-left hidden-xs hidden-sm" role="search" style="margin-top: 12px;">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" id="buscar" value="<?= isset($text) ? $text : '' ?>" name="buscar_nav" class="form-control input-sm" placeholder="Buscar...">
                    <span class="input-group-btn">
                        <button class="btn btn-buscar" id="btn_buscar_nav" onclick="buscarPor('buscar', 'tipo_aviso_buscar_nav', 'region_buscar_nav')" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>
            <div class="" style="display: none" id="selects_buscar">
                <div class="form-group">
                    <div class="input-group">
                        <select class="form-control input-sm" id="tipo_aviso_buscar_nav" name="tipo_aviso_buscar_nav">
                            <option value="">Tipo de aviso</option>
                            <?php foreach ($tipo_aviso as $tipo => $value): ?>
                                <option value="<?= $tipo ?>" <?= isset($getTipoAviso) ? $getTipoAviso == $tipo ? 'selected' : '' : '' ?>><?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <select class="form-control input-sm" id="region_buscar_nav" name="region_buscar_nav">
                            <?php foreach ($regiones as $numero => $region): ?>
                                <option value="<?= $numero ?>" <?= isset($getRegion) ? $getRegion == $numero ? 'selected' : '' : '' ?>><?= $region ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <ul class="nav navbar-nav navbar-left mobile-bar esconder">
            <li><a href="<?= base_url() ?>"><span class="menu-icon glyphicon glyphicon-home"></span>Inicio</a></li>
            <li>
                <a href="<?= base_url() ?>aviso/nuevo">
                    <span class="menu-icon glyphicon-upload glyphicon"></span>
                    Publicar
                </a>
            </li>
            <li class="hidden-xs">
                <a href="#">
                    <span class="hidden-xs">Sobre nosotros</span>
                </a>
            </li>
            <li class="hidden-xs">
                <a href="#">
                    <span class="hidden-xs">Contactanos</span>
                </a>
            </li>
            <?php if (isset($_SESSION["emailUser"])): ?>
                <li class="visible-xs visible-sm">
                    <a href="<?= base_url() ?>cuenta">
                        <span class="menu-icon glyphicon glyphicon-user"></span>
                        Perfil
                    </a>
                </li>
            <?php endif; ?>
            <li class="visible-xs">
                <a href="#navbar-more-show">
                    <span class="menu-icon glyphicon glyphicon-menu-hamburger"></span>
                    Mas
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right mobile-bar">
            <?php if (isset($_SESSION["emailUser"])): ?>
                <li class="hidden-xs">
                    <a href="#">
                        <span class="glyphicon glyphicon-bell"></span>
                    </a>
                </li>
                <li class="hidden-xs">
                    <a href="#">
                        <span class="glyphicon glyphicon-comment"></span>
                    </a>
                </li>
                <li class="dropdown hidden-xs">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="glyphicon glyphicon-user "></span>
                        <span class="">Bienvenido, <?= $_SESSION["nameUser"]; ?></span>
                        <span class="visible-xs">Mi cuenta</span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="<?= base_url() ?>cuenta">
                                <span class="glyphicon glyphicon-user "></span>&nbsp;
                                &nbsp;
                                Mi Cuenta
                            </a>
                        </li>
                        <li style="display: none" id="publicar_esconder">
                            <a href="<?= base_url() ?>aviso/nuevo">
                                <span class="menu-icon glyphicon-upload glyphicon"></span>
                                Publicar
                            </a>
                        </li>
                        <li>
                            <a href="javascript:logout();">
                                <span class="glyphicon glyphicon-log-out"></span>&nbsp;
                                &nbsp;
                                Salir
                            </a>
                        </li>
                    </ul>
                </li>
            <?php else : ?>
                <li class="hidden-xs">
                    <a class="btn-login-header" onclick="registrar();">
                        <span class="glyphicon glyphicon-info-sign"></span>&nbsp;
                        &nbsp;
                        Registrar
                    </a>
                </li>
                <li class="hidden-xs">
                    <a class="btn-login-header" id="btnLogin" onclick="abrirLoginModal();">
                        <span class="glyphicon glyphicon-log-in"></span>&nbsp;
                        &nbsp;
                        Ingresar
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<div class="container-fluid" id="main">
    <?php
    if (!isset($_SESSION['id'])):
        require_once BASEPATH . 'libraries/includes/modalLogin.php';
        ?>
    <?php endif; ?>
    <script>
        $(document).ready(function () {
            var sw = false;
            $('a[href="#navbar-more-show"], .navbar-more-overlay').on('click', function (event) {
                event.preventDefault();
                $('body').toggleClass('navbar-more-show');
                if ($('body').hasClass('navbar-more-show')) {
                    $('a[href="#navbar-more-show"]').closest('li').addClass('active');
                } else {
                    $('a[href="#navbar-more-show"]').closest('li').removeClass('active');
                }
                return false;
            });
            if (window.location.href.toString().indexOf('/aviso/by') != -1) {
                $('#publicar_esconder').show();
                if (window.innerWidth <= 991) {
                    $('.esconder').show();
                } else {
                    $('.esconder').hide();
                    $('#buscar').width($('#buscar').width() + 55);
                    $('#selects_buscar').css('display', 'inline');
                }
                window.onresize = () => {
                    if (window.innerWidth <= 980) {
                        $('.esconder').show();
                    } else {
                        $('.esconder').fadeOut(50);
                        if ($('#buscar').width() > 291) {
                            $('#buscar').animate({width: '+=55'}, 350, () => {
                                $('#selects_buscar').css('display', 'inline');
                            });
                        }
                    }
                };
            } else {
                $('#buscar').focusin(function () {
                    if (sw) {
                        sw = false;
                        return;
                    }
                    $('.esconder').fadeOut(50);
                    $('#buscar').animate({width: '+=55'}, 350, () => {
                        $('#selects_buscar').css('display', 'inline');
                    });
                });
                $('#buscar, #tipo_aviso_buscar_nav, #region_buscar_nav').blur(function () {
                    if ($('#tipo_aviso_buscar_nav').is(':hover') || $('#buscar').is(':hover') || $('#region_buscar_nav').is(':hover') || $('#btn_buscar_nav').is(':hover')) {
                        sw = true;
                        return;
                    }
                    $('#selects_buscar').hide();
                    $('#buscar').animate({width: '-=55'}, 350, () => {
                        sw = false;
                        $('.esconder').fadeIn(300);
                    });
                });
            }
        });
    </script>
