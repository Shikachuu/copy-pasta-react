<?php include('header.php'); ?>
<div class="container">
    <?php
        include_once ('../model/mindex.php');
        $pastaC = new Pasta(false);
        $pastas = $pastaC->GetPasta();
        foreach ($pastas as $pasta) {
    ?>
        <div class="card large hoverable teal darken-3">
            <a class="white-text center-align" href="view-pasta.php?id=<?php echo $pasta['id']; ?>" class="card-title"><?php echo $pasta['p_name']; ?></a>
            <pre class="hljs">
                <code>
                    <?php echo $pasta[p_content] ?>
                </code>
            </pre>
            <div class="card-action">
                <small class="text-gray">Created by: <?php echo $pasta['p_creator'] ?></small>
                <small class="text-gray">At: <?php echo $pasta['p_created'] ?></small>
            </div>
        </div>
    <?php
        }
    ?>
</div>
<?php include('footer.php'); ?>