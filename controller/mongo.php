<?php
    $connection = new MongoClient();
    $pasta = $connection->selectDB('copypasta');
    var_dump($connection);
    var_dump($pasta);
?>