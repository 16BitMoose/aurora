document.addEventListener('DOMContentLoaded', function() {
    function loadRandomImages() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'assets/php/preview.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                displayPreviewImages(response.images);
            }
        };
        xhr.send();
    }

    function displayPreviewImages(images) {
        var galleryContainer = document.getElementById('preview-container');
        galleryContainer.innerHTML = '';

        images.forEach(function(imagePath) {
            var img = document.createElement('img');
            img.src = imagePath;
            img.alt = 'Resebild';
            img.classList.add('preview-image');
            galleryContainer.appendChild(img);
        });
    }

    loadRandomImages();
});