<?php include('header.php'); ?>
<div class="container">
    <?php
        include_once ('../model/mindex.php');
        $pastaC = new Pasta(false);
        $pastas = $pastaC->GetPasta();
        foreach ($pastas as $pasta) {
    ?>
        <div class="card large hoverable blue darken-2">
            <a class="white-text" href="view-pasta.php?id=<?php echo $pasta['_id']; ?>" class="card-title"><?php echo $pasta['pasta_name']; ?></a>
            <pre class="hljs <?php echo $pasta['language']; ?>">
                <code>
                    <?php echo $pasta['pasta_content']; ?>
                </code>
            </pre>
            <div class="card-action blue darken-3">
                <small class="text-gray chip">Created by: <?php echo (isset($pasta['user_name']) ? $pasta['user_name'] : "Guest"); ?></small>
                <small class="text-gray chip">At: <?php echo $pasta['created_at']; ?> </small>
                <small class="text-gray chip">Last time edited: <?php echo $pasta['edited_at']; ?></small>
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