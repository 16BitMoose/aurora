function uploadFiles() {
    var fileInput = document.getElementById('fileInput');
    var files = fileInput.files;

    if (files.length > 0) {
        var formData = new FormData();
        
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            if (/\.(png|jpe?g)$/i.test(file.name)) {
                formData.append('files[]', file);
            } else {
                document.getElementById('response').innerHTML = "You can't upload duplicates.";
                return;
            }
        }

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'assets/php/upload.php', true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                document.getElementById('response').innerHTML = xhr.responseText;
            } else {
                alert('Error uploading files.');
            }
        };

        xhr.send(formData);
    } else {
        alert('Please select at least one file before uploading.');
    }
}
