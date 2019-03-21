<?php
    require_once('../controller/mongo.php');
    $mdb = mongodb::get();
    if (isset($_GET['id'])) {
        $id = new MongoDB\BSON\ObjectID($_GET['id']);
        $suspectPasta = iterator_to_array($mdb->getFilteredContent("pasta",['_id'=> $id]))[0];
    }
    if (isset($_POST['deleteElement'])) {
        $db->deleteObject("pasta",$_POST['deleteElement']);
        header('Refresh:5; URL:index.php');
    }
    if (isset($_POST['suggestCorrection'])) {
        
    }
?>
<?php include_once('header.php'); ?>
<div class="container">
<h4 class="center-align white-text">
    <?php echo $suspectPasta->pasta_name; ?>
</h4>
<div class="card blue darken-2">
    <div class="card-content text-white">
        <p class="card-title"><?php $suspectPasta->created_at;?></p>
        <pre class="hljs <?php echo $suspectPasta->language; ?>"><code id="<?php echo $suspectPasta->id; ?>" onmdblclick="copyToClipboard(this.id)"><?php echo $suspectPasta->pasta_content; ?></code></pre>
    </div>
    <div class="card-action blue darken-3 center-align">
        <p>Double click to copy the pasta</p>
        <button name="suggestCorrection" class="btn blue darken-4"><i class="material-icons">create</i></button>
        <button name="deleteElement" class="btn red accent-2"><i class="material-icons">delete_sweep</i></button>
    </div>
</div>
</div>
<br>
<?php include_once('footer.php'); ?>