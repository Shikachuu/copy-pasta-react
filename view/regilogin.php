<?php include('header.php'); ?>
<div class="container">
        <h2 class="center-align white-text">Login</h2>
        <form action="user.php" method="post" >
            <div class="row">
                <div class="input-field col l5 s6">
                    <input id="luser" name="luser" type="text" class="validate">
                    <label for="luser">Username</label>
                </div>
                <div class="input-field col l5 s6">
                    <input id="lpass" name="lpass" type="password" class="validate">
                    <label for="lpass">Password</label>
                </div>
            </div>
            <button class="btn blue darken-2 waves-effect waves-light fadeInDown" type="submit" name="login">Login<i class="material-icons right">how_to_reg</i></button>
        </form>
        <h2 class="center-align white-text">Register</h2>
        <form action="user.php" method="post">
            <div class="row">
                <div class="input-field col l5 s6">
                    <input type="text" name="ruser" id="ruser" class="validate">
                    <label for="ruser">Username</label>
                </div>
                <div class="input-field col l5 s6">
                    <input type="email" name="remail" id="remail" class="validate">
                    <label for="remail">Email</label>
                </div>
                <div class="input-field col l5 s6">
                    <input type="password" name="rpass" id="rpass" class="validate">
                    <label for="rpass">Password</label>
                </div>
                <div class="input-field col l5 s6">
                    <input type="password" name="rpassag" id="rpassag" class="validate">
                    <label for="rpassag">Verify Password</label>
                </div>
            </div>
            <button class="btn blue darken-2 waves-effect waves-light fadeInDown" type="submit" name="register">Register<i class="material-icons right">person_add</i></button>
        </form>
    <br>
</div>
<?php include('footer.php'); ?>