<script src="js/md5.js"></script>
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
            $.ajax("../controller/addpastac.php", {
                method: 'POST',
                data: {
                    pasta_name: dummy["pasta_name"],
                    pasta_content: dummy["pasta_content"],
                    password: dummy["password"],
                    language: dummy["language"],
                    is_private: dummy["is_private"]
                }
            })
            .then(
                function success(data) {
                    console.log(data);
                },

                function fail(data, status) {
                    alert('Request failed.  Returned status of ' + status);
                }
            );
        }
    });
}
</script>