<?php require_once('../view/header.php'); ?>
<div class="container">
    <h3 class="center-align white-text">
        <?php
        include_once("../model/userservice.php");
        $UserService = new UserService();
        if (isset($_POST["register"])) {
            echo $UserService->register($_POST["ruser"],$_POST["rpass"],$_POST["rpassag"],$_POST["remail"]);
        }
        if (isset($_POST["login"])) {
            echo $UserService->login($_POST["luser"],$_POST["lpass"]);
        }
        ?>
    </h3>
    <p class="center-align white-text">You will be redirected to the mainpage soon.</p>
    <div class="loader center-align">
        <span>{</span><span>}</span>
    </div>
</div>
<?php header("refresh:3; url=index.php"); ?>
<?php require_once('../view/footer.php'); ?>