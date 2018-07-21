<?php
$dir = '../../uploaded/tmp_avisos/';     
$files = scandir($dir);
foreach($files as $f){
   if (is_file($dir.$f)) {
      unlink($dir.$f); 
    }
}
