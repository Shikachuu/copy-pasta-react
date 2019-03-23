<?php include_once("header.php"); 
include_once("footer.php");
include_once("../controller/profilec.php");
if (isset($_SESSION["username"]) && isset($_SESSION["user_id"])) { 
    $Profiler = new Profiler($_SESSION["username"]); ?>
    <div class="row">
        <div class="col s12 m4 13 blue darken-4"> <!-- Side user bar -->
            <h3 class="center-align white-text"><?php echo $Profiler->username; ?></h3>
            <p class="center-align white-text"><?php echo $Profiler->email; ?></p>
            <p class="center-align white-text">Your pastas: number</p>
        </div>
        <div class="col s12 m8 19"> <!-- Offset Middle content -->
            <ul class="collection with-header">
                <li class="collection-header"><h4 class="center-align white-text">Your pastas</h4></li>
                <?php var_dump($Profiler->GetUserPastas()); ?>
                <li class="collection-item">
                    <div>
                        <a href="#">Pasta Name</a>
                        <div class="secondary-content">
                            <small class="chip">Language <i class="material-icons">code</i></small>
                            <small class="chip">Created <i class="material-icons">publish</i></small>
                            <small class="chip">Edited <i class="material-icons">merge_type</i></small>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
<?php } ?>