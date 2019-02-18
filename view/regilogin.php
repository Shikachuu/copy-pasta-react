<?php include('header.php'); ?>
<div class="container">
    <div class="col l5 s12">
        <h1 class="center-align white-text">Login</h1>
        <form action="../model/mlogin.php" method="post" class="row">
            <div class="input-field col l5 s6">
                <input id="luser" type="text" class="validate">
                <label for="luser">Username</label>
            </div>
            <div class="input-field col l5 s6">
                <input id="lpass" type="password" class="validate">
                <label for="lpass">Password</label>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Login<i class="material-icons right">how_to_reg</i></button>
        </form>
        <h1 class="center-align white-text">Register</h1>
        <form action="mregi.php" method="post" class="row">
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
            <button class="btn waves-effect waves-light" type="submit" name="action">Register<i class="material-icons right">person_add</i></button>
        </form>
    </div>
    <div class="col l5 offset-l5 s12">
    
    </div>
</div>
<?php include('footer.php'); ?>