<?php
    require_once 'auroloader.php';
    $mongoDB = (new src\Client)->pasta;
    var_dump($mongoDB);
?>