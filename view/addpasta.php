<?php if (isset($_SESSION["username"])&& isset($_SESSION["user_id"])) { ?>
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4 class="center-align text-white">Add pasta</h4>
        <form action="uaddpastac.php" method="post">
            <input type="text" name="pasta_name" id="pasta_name">
            <input type="textarea" name="pasta_content" id="pasta_content">
            <select name="language" id="language">
                <option value="plaintext">Plain Text</option>
                <option value="python">Python</option>
                <option value="javascript">JavaScript</option>
                <option value="php">PHP</option>
            </select>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn blue darken-2">Send</button>
        </form>
        <a href="#!" class="modal-close waves-effect waves-red btn-flat red">Cancel</a>
    </div>
</div>
<?php }else { ?>
<div id="modal1" class="modal blue darken-3">
    <div class="modal-content">
        <h4 class="center-align white-text">Add pasta</h4>
        <form action="gaddpastac.php" method="post">
            <input type="text" name="pasta_name" id="pasta_name">
            <textarea class="materialize-textarea" name="pasta_content" id="pasta_content" cols="30" rows="10"></textarea>
            <input type="password" name="password" id="password">
            <select name="language" id="language">
                <option value="plaintext">Plain Text</option>
                <option value="python">Python</option>
                <option value="javascript">JavaScript</option>
                <option value="php">PHP</option>
            </select>
    </div>
    <div class="modal-footer blue darken-4 center-align">
            <button type="submit" class="btn blue accent-2">Send</button>
        </form>
        <a href="#!" class="modal-close waves-effect waves-red btn-flat red accent-2 white-text">Cancel</a>
    </div>
</div>
<?php }?>
<script src="js/jquery-3.3.1.min.js"></script>
<script>
 $(document).ready(function(){
    $('.modal').modal();
 });
</script>