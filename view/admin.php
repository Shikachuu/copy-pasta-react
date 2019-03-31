<?php
if (isset($_SESSION["admin"])) {
include('header.php');
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
            </div>
        </div>
    <?php
        }
    ?>
</div>
<?php include('addpasta.php') ?>
<?php include('footer.php'); ?>
<?php }else {
    include_once("header.php");
    echo "<script>window.location.href='index.php';</script>";
 ?>
<?php 
    include_once("footer.php");} ?>