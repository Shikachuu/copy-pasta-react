<?php
    require_once('../model/madd.php');
    $model = new AddPasta($_POST["pasta_name"],$_POST["pasta_content"],$_POST["password"],$_POST["language"],$_POST["is_private"]);
    echo $model->Upload();
?>