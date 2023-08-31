<script>
    ClassicEditor.create(document.querySelector('.ckeditor_classic'), {
        plugins: [ 'sourceEditing' ]
    })
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
