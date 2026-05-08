<?php
function youtube_video($youtube_id, $start_time = 0) {
    $id    = htmlspecialchars($youtube_id, ENT_QUOTES, 'UTF-8');
    $start = (int) $start_time;
    echo '<div class="yt-facade video-banner" data-yt-id="' . $id . '" data-yt-start="' . $start . '" role="button" tabindex="0" aria-label="Video abspielen">';
    echo   '<div class="yt-facade__notice" style="display:none">';
    echo     '<p>Dieses Video wird von YouTube bereitgestellt. Beim Abspielen werden Daten (u.&thinsp;a. Ihre IP-Adresse) an YouTube&thinsp;/&thinsp;Google &uuml;bertragen. Mehr in der <a href="/privacy/">Datenschutzerkl&auml;rung</a>.</p>';
    echo     '<button class="yt-facade__accept">Zustimmen &amp; abspielen</button>';
    echo   '</div>';
    echo   '<a class="video-icon tran3s rounded-circle d-flex align-items-center justify-content-center position-absolute top-50 start-50 translate-middle" aria-hidden="true" tabindex="-1">';
    echo     '<img src="/images/icon/icon_140.svg" alt="">';
    echo   '</a>';
    echo '</div>';
}
?>
