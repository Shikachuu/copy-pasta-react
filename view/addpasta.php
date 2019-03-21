<?php if (isset($_SESSION["username"])&& isset($_SESSION["user_id"])) { ?>
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4 class="center-align text-white">Add pasta</h4>
        <form action="../controller/uaddpastac.php" method="post">
            <div class="input-field">
                <label for="pasta_name">Name your Pasta</label>
                <input type="text" name="pasta_name" id="pasta_name">
            </div>
            <div class="input-field">
                <label for="pasta_content">Paste it down</label>
                <textarea class="materialize-textarea" name="pasta_content" id="pasta_content" cols="30" rows="10"></textarea>
            </div>
            <div class="input-field">
                <select name="language" id="language"style="display:inherit !important">
                    <option value="plaintext">Plain Text</option>
                    <option value="python">Python</option>
                    <option value="javascript">JavaScript</option>
                    <option value="php">PHP</option>
                </select>
            </div>
            <div class="input-field">
                <div class="switch"><label>Public <input type="checkbox" name="is_private" value="1"><span class="lever"></span>Private</label></div>
            </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn blue darken-2">Send</button>
        </form>
        <a href="#!" class="modal-close waves-effect waves-red btn-flat red">Cancel</a>
    </div>
</div>
<?php }else { ?>
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4 class="center-align white-text">Add pasta</h4>
        <form action="../controller/gaddpastac.php" method="post">
            <div class="input-field">
                <label for="pasta_name">Name your Pasta</label>
                <input type="text" name="pasta_name" id="pasta_name">
            </div>
            <div class="input-field">
                <label for="pasta_content">Paste it down</label>
                <textarea class="materialize-textarea" name="pasta_content" id="pasta_content" cols="30" rows="10"></textarea>
            </div>
            <div class="input-field">
                <label for="password">Put a password here, to delete or manage it</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="input-field">
                <select name="language" id="language" style="display:inherit !important">
                    <option value="plaintext">Choose language</option>
                    <option value="plaintext">Plain Text</option>
                    <option value="python">Python</option>
                    <option value="javascript">JavaScript</option>
                    <option value="php">PHP</option>
                </select>
            </div>
            <div class="input-field">
                <div class="switch"><label>Public <input type="checkbox" name="is_private" value="1"><span class="lever"></span>Private</label></div>
            </div>
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