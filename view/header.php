<?php session_start(); 
if (isset($_POST['logout'])) {
    include_once("../model/userservice.php");
    $userHandling = new UserService();
    $userHandling.logout();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Copy Pasta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="description" content="Create and share your code anonymusly or register and discuss with others about it.">
    
    <link rel="apple-touch-icon" sizes="57x57" href="images/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="images/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="images/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="images/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="images/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" type="text/css" media="screen" href="css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/atom-one-dark.css">
    <link rel="stylesheet" href="css/loading.css">
    <link rel="stylesheet" href="css/animate.min.css">

</head>
<body class="grey darken-3">
    <nav class="blue darken-2 fadeInDown">
        <div class="nav-wrapper">
            <a href="index.php" class="brand-logo"> { Copy Pasta }</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="index.php"><span class="material-icons" style="font-size:14px;">view_headline</span> Public Pasta</a></li>
                <?php echo (!isset($_SESSION["username"]))? '<li class="nav-content"><a href="regilogin.php"><span class="material-icons" style="font-size:14px;">contacts</span> Register/Login</a></li>' : '<li class="nav-content"><a href="profile.php"><span class="material-icons" style="font-size:14px;">assignment_ind</span> Profile</a></li>'; ?>
                <?php echo (isset($_SESSION["admin"])) ? '<li class="nav-content"><a href="admin.php"><span class="material-icons" style="font-size:14px;">build</span> Admin View</a></li>' : '' ?>
                <?php echo (isset($_SESSION["username"]) && isset($_SESSION["user_id"])) ? '<li class="nav-content"><form method="POST"><button class="btn blue darken-4"><span class="material-icons" style="font-size:14px;">directions_run</span> Log out</button></form></li>' : '' ?>
            </ul>
            <ul id="nav-mobile" class="hide-on-large-only">
                <div class="left">
                    <li class="nav-content"><a href="index.php"><span class="material-icons" style="font-size:14px;">view_headline</span> Public Pasta</a></li>
                    <?php echo (!isset($_SESSION["username"]))? '<li class="nav-content"><a href="regilogin.php"><span class="material-icons" style="font-size:14px;">contacts</span> Register/Login</a></li>' : '<li class="nav-content"><a href="profile.php"><span class="material-icons" style="font-size:14px;">assignment_ind</span> Profile</a></li>'; ?>
                </div>
                <div class="right">
                    <?php echo (isset($_SESSION["admin"])) ? '<li class="nav-content"><a href="admin.php"><span class="material-icons" style="font-size:14px;">build</span> Admin View</a></li>' : '' ?>
                    <?php echo (isset($_SESSION["username"]) && isset($_SESSION["user_id"])) ? '<li class="nav-content"><form method="POST"><button class="btn blue darken-4"><span class="material-icons" style="font-size:14px;">directions_run</span> Log out</button></form></li>' : '' ?>
                </div>
            </ul>
        </div>
    </nav>