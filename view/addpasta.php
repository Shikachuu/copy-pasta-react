<script src="js/md5.js"></script>
<?php if (!isset($_SESSION["username"])) { ?>
<script>
function addNewPasta() {
    Swal.mixin({
        confirmButtonText: 'Next <i class="material-icons" style="font-size:12px">send</i>',
        showCancelButton: true,
        progressSteps: ['1','2','3','4','5']
    }).queue([
        {
            title: 'How do you want to name your pasta?(4 to 64 char)',
            input: 'text',
            inputAttributes: {
                minlength: 8,
                maxlength: 64,
                autocapitalize: 'off',
                autocorrect: 'off'
            }
        },
        {
            title: 'Let me paste it!(at least 4 char)',
            input: 'textarea',
            inputAttributes: {
                minlength: 8
            }
        },
        {
            title: 'Enter your password for this pasta(8 to 64 char)',
            input: 'password',
            inputAttributes: {
                minlength: 8,
                maxlength: 64,
                autocapitalize: 'off',
                autocorrect: 'off'
            }
        },
        {
            title: 'What programing language do you use?',
            input: 'select',
            inputOptions: {
                'python' : 'Python',
                'sql' : 'SQL'
            },
            inputPlaceholder: 'Select a language',
        },
        {
            title: 'Is your pasta private?',
            input: 'checkbox',
            inputValue: true,
            inputPlaceholder: 'I do not want to share my spaghetti at the front page.',
        }
    ]).then((result)=>{
        if (result.value) {
            Swal.fire({
                title: 'All done!',
                type: 'info',
                html:'Your pasta have been submited to the queue!',
                confirmButtonText: 'Sweet!',
            });
            let dummy = {};
            for(index in result.value){
                dummy["pasta_name"] = result.value[0];
                dummy["pasta_content"] = result.value[1];
                dummy["password"] = md5(result.value[2]);
                dummy["language"] = result.value[3];
                dummy["is_private"] = result.value[4];
            }
            let req = new XMLHttpRequest();
            req.open('POST', '/controller/addpastac.php', true);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
            req.send(encodeURI(dummy["pasta_name"], dummy["pasta_content"], dummy["password"],dummy["language"],dummy["is_private"]));
        }
    });
}
</script>
<?php }else{ ?>
    <script>
function addNewPasta() {
    Swal.mixin({
        confirmButtonText: 'Next <i class="material-icons" style="font-size:12px">send</i>',
        showCancelButton: true,
        progressSteps: ['1','2','3','4','5']
    }).queue([
        {
            title: 'How do you want to name your pasta?(4 to 64 char)',
            input: 'text',
            inputAttributes: {
                minlength: 8,
                maxlength: 64,
                autocapitalize: 'off',
                autocorrect: 'off'
            }
        },
        {
            title: 'Let me paste it!(at least 4 char)',
            input: 'textarea',
            inputAttributes: {
                minlength: 8
            }
        },
        {
            title: 'What programing language do you use?',
            input: 'select',
            inputOptions: {
                'python' : 'Python',
                'sql' : 'SQL'
            },
            inputPlaceholder: 'Select a language',
        },
        {
            title: 'Is your pasta private?',
            input: 'checkbox',
            inputValue: true,
            inputPlaceholder: 'I do not want to share my spaghetti at the front page.',
        }
    ]).then((result)=>{
        if (result.value) {
            Swal.fire({
                title: 'All done!',
                type: 'info',
                html:'Your pasta have been submited to the queue!',
                confirmButtonText: 'Sweet!',
            });
            let dummy = {};
            for(index in result.value){
                dummy["pasta_name"] = result.value[0];
                dummy["pasta_content"] = result.value[1];
                dummy["language"] = result.value[3];
                dummy["is_private"] = result.value[4];
                //insert session storage here userid + username
                //https://developer.mozilla.org/en-US/docs/Web/API/Window/sessionStorage
            }
            let req = new XMLHttpRequest();
            req.open('POST', '/controller/addpastac.php', true);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
            req.send(encodeURI(dummy["pasta_name"], dummy["pasta_content"],dummy["language"],dummy["is_private"]));
        }
    });
}
</script>
<?php } ?>
<script>
let returnMSG;
if (true) {
    Swal.fire({
    position: 'top-end',
    type: 'success',
    title: 'Your pasta has been uploaded',
    showConfirmButton: false,
    timer: 1500
    });
}else{
    Swal.fire({
    position: 'top-end',
    type: 'error',
    title: `Oops...we found some error in the upload.`,
    text: `${returnMSG}`,
    showConfirmButton: false
    });
}
</script>