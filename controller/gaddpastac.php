<?php
    require_once('../model/mgadd.php');
    $model = new GAddPasta($_POST["pasta_name"],$_POST["pasta_content"],$_POST["password"],$_POST["language"],$_POST["is_private"]);
    echo $model->Upload();
?>