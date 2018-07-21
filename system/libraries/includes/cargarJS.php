<?php
$fecha     = new DateTime();
$fuentesJs = array(
	'assets/js/bootstrap.js',
	'assets/js/indexJS.js',
	'assets/js/registrarJS.js',
	'assets/js/comunasJS.js',
	'assets/js/publicarJS.js',
	'assets/js/ver.js',
);
foreach ($fuentesJs as $fuente) {
	echo '<script type="text/javascript" src="'.base_url().$fuente.'?'.$fecha->getTimestamp().'"></script>';
}