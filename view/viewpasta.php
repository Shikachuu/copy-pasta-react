<?php
    require_once('inc/db.php');
    $db = db::get();
    if (isset($_GET['_id'])) {
        $selectPasta = "SELECT * FROM guest_pasta WHERE pid = ".$_GET['_id'];
        $suspectPasta = $db->getRow($selectPasta);
    }
    if (isset($_POST['deleteElement'])) {
        $deleteQueryString = "DELETE FROM guest_pasta WHERE pid = ".$_POST['deleteElement'];
        $db->query($deleteQueryString);
        header('Refresh:5; URL:index.php');
    }
?>
<?php include_once('header.php'); ?>
<div class="container">
    <div class="jumbotron">
        <h4 class="text-center">
            <?php echo $suspectPasta['pname']; ?>
        </h4>
    </div>
    <div class="card blue darken-3">
        <div class="card-content text-white">
            <h2 class="card-title"><?php $suspectPasta['pcreated'];?></h2>
            <pre class="hljs <?php echo $suspectPasta['language']; ?>"><code id="<?php echo $suspectPasta['pid']; ?>" ondblclick="copyToClipboard(this.id)"><?php echo $suspectPasta['pcontent']; ?></code></pre>
        </div>
        <div class="card-action blue darken-3"><p>Double click to copy the pasta</p><button class="btn btn-outline-info"><i class="material-icons">create</i></button> <button class="btn btn-outline-danger"><i class="material-icons">delete_sweep</i></button></div>
    </div>
</div>
<?php include_once('footer.php'); ?>