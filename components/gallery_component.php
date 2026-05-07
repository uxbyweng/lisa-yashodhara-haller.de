<?php
function render_gallery($imageData) {
    if(is_array($imageData) && count($imageData) > 1) {
        // Mehrere Bilder (Carousel)
        echo '<div id="gallery-carousel" class="carousel slide me-xxl-5 md-mb-40" data-bs-ride="carousel">';
        echo '<div class="carousel-inner">';
        foreach($imageData as $index => $data) {
            $activeClass = ($index === 0) ? 'active' : '';
            echo '<div class="carousel-item ' . $activeClass . '">';
            echo '<img src="' . $data['path'] . '" class="d-block w-100" alt="' . $data['alt'] . '">';
            // Überprüfen, ob eine Bildunterschrift vorhanden ist
            if (!empty($data['caption'])) {
                echo '<div class="carousel-caption">';
                echo htmlspecialchars($data['caption']);
                echo '</div>';
            }
            echo '</div>';
        }
        echo '</div>';
        echo '<button class="carousel-control-prev" type="button" data-bs-target="#gallery-carousel" data-bs-slide="prev">';
        echo '<i class="bi bi-chevron-left"></i>';
        echo '<span class="visually-hidden">Previous</span>';
        echo '</button>';
        echo '<button class="carousel-control-next" type="button" data-bs-target="#gallery-carousel" data-bs-slide="next">';
        echo '<i class="bi bi-chevron-right"></i>';
        echo '<span class="visually-hidden">Next</span>';
        echo '</button>';
        echo '</div>';
    } else if (is_array($imageData) && count($imageData) == 1) {
        // Einzelnes Bild ohne Carousel
        echo '<figure>';
        echo '<img src="' . $imageData[0]['path'] . '" alt="' . $imageData[0]['alt'] . '">';
        // Überprüfen, ob eine Bildunterschrift vorhanden ist
        if (!empty($imageData[0]['caption'])) {
            echo '<figcaption>' . htmlspecialchars($imageData[0]['caption']) . '</figcaption>';
        }
        echo '</figure>';
    }
}
?>
