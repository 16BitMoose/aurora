document.addEventListener("DOMContentLoaded", function () {
    const gallery = document.getElementById("gallery");
    const loadMoreButton = document.getElementById("loadMore");
    let startIndex = 0;
    const imagesPerPage = 20;

    function loadImages() {
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const images = JSON.parse(xhr.responseText);
                displayImages(images);
            }
        };
        xhr.open("GET", "assets/php/preview.php", true);
        xhr.send();
    }

    function displayImages(images) {
        const endIndex = startIndex + imagesPerPage;
        for (let i = startIndex; i < endIndex && i < images.length; i++) {
            const image = document.createElement("img");
            image.src = images[i];
            image.alt = "Image " + (i + 1);
            image.loading = "lazy";
            image.className = "thumbnail";
            image.addEventListener("click", function () {
                downloadImage(images[i]);
            });
            gallery.appendChild(image);
        }

        startIndex = endIndex;

        if (startIndex >= images.length) {
            loadMoreButton.style.display = "none";
        } else {
            loadMoreButton.style.display = "block";
        }
    }

    loadImages();

    loadMoreButton.addEventListener("click", function () {
        loadImages();
    });

    function downloadImage(imagePath) {
        const link = document.createElement("a");
        link.href = imagePath;
        link.download = "image";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
});