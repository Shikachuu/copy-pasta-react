var req = new XMLHttpRequest();
function addNewPasta() {
    Swal.mixin({
        confirmButtonText: 'Next <i class="material-icons" style="font-size:12px">send</i>',
        showCancelButton: true,
        progressSteps: ['1', '2', '3', '4', '5']
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
                'python': 'Python',
                'sql': 'SQL'
            },
            inputPlaceholder: 'Select a language',
        },
        {
            title: 'Is your pasta private?',
            input: 'checkbox',
            inputValue: true,
            inputPlaceholder: 'I do not want to share my spaghetti at the front page.',
        }
    ]).then((result) => {
        if (result.value) {
            Swal.fire({
                title: 'All done!',
                type: 'info',
                html: 'Your pasta have been submited to the queue!',
                confirmButtonText: 'Sweet!',
            });
            alert(result.value[0] + " " + result.value[1] + result.value[2] + result.value[3] + result.value[4])
            let formData = new FormData();
            formData.append("pasta_name", result.value[0]);
            formData.append("pasta_content", result.value[1]);
            formData.append("language", result.value[2]);
            formData.append("password", result.value[3]);
            formData.append("is_private", result.value[4]);
            res = ajaxPost(formData,"./controller/gaddpastac.php");
            res.then((data)=>{
                alert('jhdu,újhd');
                Swal.fire({
                position: 'top-end',
                type: 'success',
                title: 'Your pasta has been uploaded',
                showConfirmButton: false,
                timer: 1500
                });
            }).catch((data)=>{
                alert('más szövege van');
                Swal.fire({
                    position: 'top-end',
                    type: 'error',
                    title: `Oops...we found some error in the upload.`,
                    text: `${data}`,
                    showConfirmButton: false
                });
            });
        }
    });
}