<?php include('header.php'); ?>
<div class="container" style="height: 90vh; max-height:auto">
    <?php
        include_once ('../model/mindex.php');
        $pastaC = new Pasta(false);
        $pastas = $pastaC->GetPasta();
        foreach ($pastas as $pasta) {
    ?>
        <div class="card large hoverable blue darken-2 flipInY">
            <a style="display: block; margin: 0 auto; font-weight: bold; font-size: 20px;" class="white-text center-align" href="view-pasta.php?id=<?php echo $pasta->_id; ?>" class="card-title"><?php echo $pasta->pasta_name; ?></a>
            <pre style="height:90%" class="hljs <?php echo $pasta->language; ?>" onmdblclick="copyToClipboard(this.id)"><code><?php echo $pasta->pasta_content; ?></code></pre>
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
<div class="fixed-action-btn hide-on-med-and-down bounceIn">
    <a onclick="addNewPasta()" class="btn-floating btn-large waves-effect waves-blue blue darken-2"><i class="material-icons">add</i></a>
</div>
<div class="fixed-action-btn hide-on-large-only bounceIn">
    <a onclick="addNewPasta()" class="btn-floating waves-effect waves-blue blue darken-2"><i class="material-icons">add</i></a>
</div>
<?php include('addpasta.php') ?>
<?php include('footer.php'); ?>