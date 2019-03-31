<?php
    require_once('../controller/mongo.php');
    $mdb = mongodb::get();
    if (isset($_GET['id'])) {
        $id = new MongoDB\BSON\ObjectID($_GET['id']);
        $suspectPasta = iterator_to_array($mdb->getFilteredContent("pasta",['_id'=> $id]))[0];
    }
    if (isset($_POST['deleteElement'])) {
        if ($_SESSION["username"] == $suspectPasta->user_name || isset($_SESSION["admin"])) {
            $mdb->deleteObject("pasta",$id);
            header("refresh:3; url=index.php");
        }
        else {
            if ($suspectPasta->password == md5($_POST["password"])||isset($_SESSION["admin"])) {
                $mdb->deleteObject("pasta",$id);
                header("refresh:3; url=index.php");
            }
        }
    }?>
<?php include_once('header.php'); ?>
<div class="container">
<h4 class="center-align white-text">
    <?php echo $suspectPasta->pasta_name; ?>
</h4>
<div class="card blue darken-2">
    <div class="card-content text-white">
        <p class="card-title"><?php echo $suspectPasta->edited_at->toDateTime()->format('D Y-m-d H:i');?></p>
        <pre class="hljs <?php echo $suspectPasta->language; ?>"><code id="<?php echo $suspectPasta->_id; ?>" ondblclick="copyToClipboard(this.id)"><?php echo $suspectPasta->pasta_content; ?></code></pre>
        <small class="text-gary chip">Language: <?php echo $suspectPasta->language; ?></small>
        <small class="text-gray chip">Created by: <?php echo isset($suspectPasta->username) ? $suspectPasta->username : "Guest"; ?></small>
        <small class="text-gray chip">Created at: <?php echo $suspectPasta->created_at->toDateTime()->format('D Y-m-d H:i'); ?></small>
    </div>
    <div class="card-action blue darken-3">
        <p class="center-align">Double click to copy the pasta</p>
        <ul class="collapsible" style="border:none;">
            <li style="border:none;">
                <div class="collapsible-header red white-text" style="border:none;"><i class="material-icons">delete_sweep</i>Delete Pasta</div>
                <div class="collapsible-body center-align" style="border:none;">
                    <form method="post">
                        <?php echo isset($suspectPasta->password) ? '<div class="input-field"><input type="password" name="password" id="password"><label for="password">Password</label></div>' : "" ?>
                        <button name="deleteElement" type="submit" class="btn red accent-2 modal-trigger btn-large"><i class="material-icons">delete_sweep</i></button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
</div>
<br>
<script src="js/jquery-3.3.1.min.js"></script>
<script>
    $(document).ready(function(){
    $('.collapsible').collapsible();
  });
</script>
<?php include_once('footer.php'); ?>
