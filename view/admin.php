<?php
if (isset($_SESSION["admin"]) && $_SESSION["admin"] == "This is my kingdom now!") {
include('header.php');
if (isset($_POST['deleteElement'])) {
    $db->deleteObject("pasta",$_POST['deleteElement']);
    header('Refresh:5; URL:index.php');
}
?>

<div class="container">
    <?php
        include_once ('../model/mindex.php');
        $pastaC = new Pasta(true);
        $pastas = $pastaC->GetPasta();
        foreach ($pastas as $pasta) {
    ?>
        <div class="card large hoverable blue darken-2">
            <a style="display: block; margin: 0 auto; font-weight: bold; font-size: 20px;" class="white-text center-align" href="view-pasta.php?id=<?php echo $pasta->_id; ?>" class="card-title"><?php echo $pasta->pasta_name; ?></a>
            <pre style="height:90%" class="hljs <?php echo $pasta->language; ?>"><code><?php echo $pasta->pasta_content; ?></code></pre>
            <div class="card-action blue darken-3">
                <small class="text-gray chip">Created by: <?php echo (isset($pasta->user_name) ? $pasta->user_name : "Guest"); ?></small>
                <small class="text-gray chip">At: <?php echo $pasta->created_at->toDateTime()->format('D Y-m-d H:i'); ?> </small>
                <small class="text-gray chip">Last time edited: <?php echo $pasta->edited_at->toDateTime()->format('D Y-m-d H:i'); ?></small>
                <small class="text-gray chip">Language: <?php echo $pasta->language; ?></small>
                <button name="deleteElement" class="btn red accent-2"><i class="material-icons">delete_sweep</i></button>
            </div>
        </div>
    <?php
        }
    ?>
</div>
<div class="fixed-action-btn hide-on-med-and-down">
        <a onclick="addNewPasta()" class="btn-floating btn-large waves-effect waves-blue blue darken-2"><i class="material-icons">add</i></a>
</div>
<div class="fixed-action-btn hide-on-large-only">
        <a onclick="addNewPasta()" class="btn-floating waves-effect waves-blue blue darken-2"><i class="material-icons">add</i></a>
</div>
<?php include('addpasta.php') ?>
<?php include('footer.php'); ?>
<?php }else {
    include_once["header"];
    include_once["footer"];
    header("refresh:3; url=../view/index.php");
 ?>
<h1 class="white-text alig-center">Rossz szomszédságban kötöttél ki szerecsen!</h1>
<div class="loader center-align">
    <span>{</span><span>}</span>
</div>
<?php } ?>