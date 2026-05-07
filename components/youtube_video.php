<?php
function youtube_video($youtube_id, $start_time = 0) {
    echo '<div class="video-banner d-flex align-items-center justify-content-center" style="background: url(https://img.youtube.com/vi/'.$youtube_id.'/0.jpg) no-repeat center; background-size: cover; height: 0; padding-bottom: 56.25%; position: relative;">';
    echo '<a class="fancybox video-icon tran3s rounded-circle d-flex align-items-center justify-content-center position-absolute top-50 start-50 translate-middle" data-fancybox="" href="https://www.youtube.com/embed/'.$youtube_id.'?si=4Qp-AVLO2QSAkE5t&amp;start='.$start_time.'">';
    echo '<img src="/images/icon/icon_140.svg" alt="Play Button">';
    echo '</a>';
    echo '</div>';
}
?>