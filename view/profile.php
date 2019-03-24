<?php include_once("header.php"); 
include_once("../controller/profilec.php");
if (isset($_SESSION["username"]) && isset($_SESSION["user_id"])) { 
    $Profiler = new Profiler($_SESSION["username"]);
    $pastaCounter=0; ?>
    <div class="row">
        <div class="col s12 m4 13 blue darken-4"> <!-- Side user bar -->
            <h3 class="center-align white-text"><?php echo $Profiler->username; ?></h3>
            <p class="center-align white-text"><?php echo $Profiler->email; ?></p>
            <p class="center-align white-text">Your pastas: <?php echo $pastaCounter; ?></p>
        </div>
        <div class="col s12 m8 19 blue darken-4"> <!-- Offset Middle content -->
            <ul class="collection with-header blue darken-4">
                <li class="collection-header blue darken-4"><h4 class="center-align white-text">Your pastas</h4></li>
                <?php foreach($Profiler->GetUserPastas() as $pasta){ $pastaCounter++;?>
                <li class="collection-item blue accent-2" style="padding: 25px;">
                    <div>
                        <a class="white-text flow-text" href="view-pasta.php?id=<?php echo $pasta->_id; ?>" > <?php echo $pasta->pasta_name; ?></a>
                        <div class="secondary-content">
                            <small class="chip"><?php echo $pasta->language; ?> <i class="material-icons" style="font-size:14px;">code</i></small>
                            <small class="chip"><?php echo $pasta->created_at->toDateTime()->format('D Y-m-d H:i'); ?> <i class="material-icons" style="font-size:14px;">publish</i></small>
                            <small class="chip"><?php echo $pasta->edited_at->toDateTime()->format('D Y-m-d H:i'); ?> <i class="material-icons" style="font-size:14px;">merge_type</i></small>
                        </div>
                    </div>
                </li>
                <?php }
                if ($pastaCounter < 1) {?>
                <li class="collection-header blue-grey darken-1 center-align white-text" style="padding: 50px;">You don't have any pastas, its time to <a href="index.php">create one!</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
<?php } 
include_once("footer.php");?>