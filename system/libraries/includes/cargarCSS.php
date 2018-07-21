<?php

$fecha = new DateTime();
$fuentesCss = array(
    base_url() . "assets/css/main.style.css",
    base_url() . "assets/css/jquery-ui.min.css",
    base_url() . "assets/css/jquery-ui.structure.min.css",
    base_url() . "assets/css/jquery-ui.theme.min.css",
    base_url() . "assets/css/bootstrap.css"
);
foreach ($fuentesCss as $fuente) {
    echo '<link rel="stylesheet" type="text/css" href="' . $fuente . '?' . $fecha->getTimestamp() . '">';
}
