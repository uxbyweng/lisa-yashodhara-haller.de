<?php
function generate_breadcrumb() {
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $breadcrumbs = explode('/', $url);
    
    // Entferne leeres Element am Anfang (wegen führendem Slash)
    array_shift($breadcrumbs);
    
    // Erzeuge Breadcrumb-Navigation
    $breadcrumb = '<div class="breadcrumb">';
    
    // Füge den Home-Link als ersten Breadcrumb hinzu
    $breadcrumb .= '<a href="/">Home</a> &nbsp;&gt;&nbsp; ';
    
    $currentPath = '/';
    foreach ($breadcrumbs as $crumb) {
        $currentPath .= $crumb . '/';
        if ($crumb !== '') {
            $breadcrumb .= '<a href="' . $currentPath . '">' . ucfirst($crumb) . '</a> &nbsp;&gt;&nbsp; ';
        }
    }
    
    // Entferne das letzte " &gt; " und die Leerzeichen und schließe das div-Element
    $breadcrumb = rtrim($breadcrumb, ' &nbsp;&gt;&nbsp; ');
    
    // Entferne Sprachparameter (?lang=xx) aus dem letzten Crumb
    $breadcrumb = preg_replace('/<a href="([^"]+)\?lang=[^"]+">/', '<a href="$1">', $breadcrumb);
    
    $breadcrumb .= '</div>';
    
    return $breadcrumb;
}
?>