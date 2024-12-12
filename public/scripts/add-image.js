document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.getElementById('fileInput');
    const fileForm = document.getElementById('fileForm');
    const openFileButton = document.querySelector('.image-add-button');

    openFileButton.addEventListener('click', () => {
        fileInput.click();
    });

    fileInput.addEventListener('change', () => {
        if (fileInput.files.length > 0) {
            fileForm.submit();
        }
    });
});
