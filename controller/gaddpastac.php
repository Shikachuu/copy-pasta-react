<?php
    require_once('../model/mgadd.php');
    if (isset($_POST["is_private"]) && $_POST["isprivate"] === "1") {
        $is_private=1;
    }else {
        $is_private=0;
    }
    $model = new GAddPasta($_POST["pasta_name"],$_POST["pasta_content"],md5($_POST["password"]),$_POST["language"],$_POST["is_private"]);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../view/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../view/css/loading.css">
</head>
<body class="white-text blue darken-3">
    <div class="container">
        <h3><?php $dummy1 = $model->Upload(); echo isset($dummy1[0]) ? $dummy1[0] : $dummy1; ?></h3>
        <p>You will be redirected to the main page.</p>
        <div class="loader center-align">
            <span>{</span><span>}</span>
        </div>
<?php echo "<script>setTimeout(()=>{window.location.href='../view/view-pasta.php?id=".$dummy1[1]."';},1500)</script>"; ?>
    </div>
</body>
</html>
<script></script>