<?php if (isset($_SESSION["username"])&&isset($_SESSION["user_id"])) { ?>
<div id="addmodal" class="modal blue darken-3">
    <div class="modal-content">
        <h4 class="center-align text-white">Add pasta</h4>
        <form action="uaddpastac.php" method="post">
        </form>
    </div>
</div>
<?php }else { ?>
<div id="addmodal" class="modal blue darken-3">
    <div class="modal-content">
        <h4 class="center-align text-white">Add pasta</h4>
        <form action="gaddpastac.php" method="post">
        </form>
    </div>
</div>
<?php }?>