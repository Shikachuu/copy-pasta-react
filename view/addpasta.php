<script>
function addNewPasta() {
    Swal.mixin({
        confirmButtonText: 'Next <i class="material-icons" style="font-size:12px">send</i>',
        showCancelButton: true,
        progressSteps: ['1','2','3','4']
    }).queue([
        {
            title: 'How do you want to name your pasta?',
            input: 'text',
            inputAttributes: {
                maxlength: 64,
                autocapitalize: 'off'
            }
        },
        {
            title: 'Let me paste it!',
            input: 'textarea',
        },
        {
            title: 'Enter your password for this pasta',
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
        }
    ]).then((result)=>{
        if (result.value) {
            Swal.fire({
                title: 'All done!',
                html:'Your pasta have been submited!',
                confirmButtonText: 'Sweet!',
            });
            console.log(JSON.stringify(result.value));
        }
    });
}
</script>