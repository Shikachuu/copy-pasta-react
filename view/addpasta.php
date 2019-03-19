<script src="js/md5.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="js/ajaxPost.js"></script>
<?php if (!isset($_SESSION["username"])) { ?>
<script src="guestAdd.js"></script>
<?php }else{ ?>
<script src="userAdd.js"></script>
<?php } ?>
<script>
    
</script>