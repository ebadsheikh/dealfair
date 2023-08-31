<script>
        function showAttachment() {
            var attachmentInput = document.getElementById('file-explorer-input');
            var previewDiv = document.getElementById('attachment-preview');

            // select the file input field and check if a file has been selected
            if (attachmentInput.files && attachmentInput.files[0]) {
                var file = attachmentInput.files[0];

                var fileSize = (file.size / 1024).toFixed(2); // convert to KB and round off to 2 decimal places

                var fileName = file.name;
                var fileType = fileName.split('.').pop(); // extract the file extension from the file name

                var validFileTypes = ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png', 'txt', 'xls', 'xlsx', 'ppt', 'pptx',
                    'rtf'
                ];

                if (validFileTypes.indexOf(fileType.toLowerCase()) !== -
                    1) { // convert fileType to lower case to avoid case sensitivity issues
                    previewDiv.innerHTML = fileName + ' (' + fileSize + ' KB)';
                } else {
                    previewDiv.innerHTML = 'Invalid file type. Please select a valid file type.';
                }
            }
        }
    </script>
    <script>
        // Get the scrollable card element
        var scrollableCard = document.getElementById('my-scrollable-card');

        // Scroll to the bottom of the card
        scrollableCard.scrollTo(0, scrollableCard.scrollHeight);
    </script>
