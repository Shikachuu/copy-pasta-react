<?php
    require_once('../controller/mongo.php');
    $mdb = mongodb::get();
    if (isset($_GET['id'])) {
        $id = new MongoDB\BSON\ObjectID($_GET['id']);
        $suspectPasta = iterator_to_array($mdb->getFilteredContent("pasta",['_id'=> $id]))[0];
    }
    if (isset($_POST['deleteElement'])) {
        if (isset($suspectPasta->user_name)) {
            if ($_SESSION["username"] == $suspectPasta->user_name) {
                $mdb->deleteObject("pasta",$id);
                header("refresh:3; url=index.php");
            }
        }else {
            if (isset($suspectPasta->password) && $suspectPasta->password == md5($_POST["password"])) {
                $mdb->deleteObject("pasta",$id);
                header("refresh:3; url=index.php");
            }
        }
        
    }
    if (isset($_SESSION["username"]) && isset($suspectPasta->user_name) && $suspectPasta->user_name === $_SESSION["username"]) {?>
    <div id="modal3" class="modal">
        <div class="modal-content">
            <h4 class="center-align text-white">Warning!</h4>
            <p>Are you sure you want to delete your pasta?</p>
            <form method="post">
        </div>
        <div class="modal-footer">
            <button type="deleteElement" class="btn blue darken-2">Send</button>
            </form>
            <a href="#!" class="modal-close waves-effect waves-red btn-flat red">Cancel</a>
        </div>
    </div>
    <?php }elseif (isset($suspectPasta->password)) { ?>
        <div id="modal3" class="modal">
        <div class="modal-content">
            <h4 class="center-align text-white">Warning!</h4>
            <p>To delete your pasta you should insert your password first.</p>
            <form method="post">
            <div class="input-field">
                <label for="password">Insert your password to here.</label>
                <input type="password" name="password" id="password">
            </div>
        </div>
        <div class="modal-footer">
            <button type="deleteElement" class="btn blue darken-2">Send</button>
            </form>
            <a href="#!" class="modal-close waves-effect waves-red btn-flat red">Cancel</a>
        </div>
    </div>
    <?php } ?>
<?php include_once('header.php'); ?>
<div class="container">
<h4 class="center-align white-text">
    <?php echo $suspectPasta->pasta_name; ?>
</h4>
<div class="card blue darken-2">
    <div class="card-content text-white">
        <p class="card-title"><?php $suspectPasta->created_at;?></p>
        <pre class="hljs <?php echo $suspectPasta->language; ?>"><code id="<?php echo $suspectPasta->_id; ?>" onmdblclick="copyToClipboard(this.id)"><?php echo $suspectPasta->pasta_content; ?></code></pre>
        <small class="text-gary chip">Language: <?php echo $suspectPasta->language; ?></small>
        <small class="text-gray chip">Created by: <?php echo (isset($pasta->user_name) ? $pasta->user_name : "Guest"); ?></small>
    </div>
    <div class="card-action blue darken-3 center-align">
        <p>Double click to copy the pasta</p>
        <form method="post">
            <button name="deleteElementPopup" data-target="modal3" class="btn red accent-2"><i class="material-icons">delete_sweep</i></button>
        </form>
    </div>
</div>
</div>
<br>
<?php include_once('footer.php'); ?>