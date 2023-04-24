<?php
    foreach(glob("./temporales/tem*.*") as $nombrearchivo){
        unlink($nombrearchivo);
    }
?>