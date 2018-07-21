<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php
            $this->benchmark->mark('empieza');
        ?>
        <title><?php echo $title; ?></title>
        <?php require_once(BASEPATH . 'libraries/includes/cargarCSS.php'); ?>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.2.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
        <?php require_once BASEPATH . 'libraries/includes/cargarJS.php'; ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
    </head>
    <body>
        <?php require_once BASEPATH . 'libraries/includes/navbar.php';
