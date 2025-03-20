function previewAndUploadImage() {
    const input = document.getElementById('uploadInput');
    const form = document.getElementById('uploadForm');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('profileImage').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);

        const formData = new FormData(form);
        fetch('/upload-photo', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
            .then(response => response.json())
            .then(data => {
                console.log("Upload success:", data);
            })
            .catch(error => {
                console.error("Upload error:", error);
            });
    }
}