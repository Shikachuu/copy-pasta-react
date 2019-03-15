<?php
    require_once('../model/muadd.php');
    $model = new UAddPasta($_POST["pasta_name"],$_POST["pasta_content"],$_POST["username"],$_POST["language"],$_POST["is_private"],$POST["user_id"]);
    echo $model->Upload();
?>