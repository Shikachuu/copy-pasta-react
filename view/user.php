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
    <p class="center-align white-text">You will be redirected soon.</p>
    <div class="loader center-align">
        <span>{</span><span>}</span>
    </div>
</div>
<?php echo isset($_SESSION["username"]) ?"<script>setTimeout(()=>{window.location.href='index.php';},1500)</script>" :  "<script>setTimeout(()=>{window.location.href='regilogin.php';},1500)</script>"; ?>
<?php require_once('../view/footer.php'); ?>