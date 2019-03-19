<?php
    require_once('../model/muadd.php');
    $model = new UAddPasta($_POST["pasta_name"],$_POST["pasta_content"],$_SESSION['username'],$_POST["language"],$_POST["is_private"],$_SESSION["user_id"]);
    echo $model->Upload();
?>