<?php
/**
 * Relaunch v01 – Seitenkopf.
 * Vor dem Einbinden setzen: $metaTitle, $metaDesc (nicht leer); optional $ogImg (absolute URL), $navActive (Schlüssel aus v01_url()).
 * Verdeckt: noindex/nofollow, kein canonical (siehe docs/todo-gesamtliste.md, Abschnitt 9).
 */

// Cache-Busting wie auf der alten Seite (?v=<Änderungszeit>)
if (!function_exists('asset')) {
    function asset(string $path): string {
        $file = $_SERVER['DOCUMENT_ROOT'] . $path;
        return is_file($file) ? $path . '?v=' . filemtime($file) : $path;
    }
}

/**
 * Link-Helfer: Schlüssel -> URL. Seiten, die es in v01 noch nicht gibt, verweisen auf die alte Seite.
 * Wenn eine v01-Seite fertig ist, den Eintrag von '/alt/' auf '/v01/neu/' umstellen.
 */
if (!function_exists('v01_url')) {
    function v01_url(string $key): string {
        static $map = [
            'home'         => '/v01/',
            'profil'       => '/v01/about/',
            'forschung'    => '/projects/',
            'publikationen'=> '/v01/publications/',
            'lehre'        => '/courses/',
            'vortraege'    => '/talks-and-workshops/',
            'medien'       => '/press-media/',
            'kontakt'      => '/contact/',
            'impressum'    => '/imprint/',
            'datenschutz'  => '/privacy/',
        ];
        return $map[$key] ?? '/v01/';
    }
}

/** Brotkrumen: $crumbs = [['Label', 'url'], …, ['Aktuelle Seite']]; Startseite wird vorangestellt. */
if (!function_exists('v01_breadcrumb')) {
    function v01_breadcrumb(array $crumbs): string {
        $out = '<nav class="v01-breadcrumb" aria-label="Brotkrumen"><a href="' . v01_url('home') . '">Startseite</a>';
        foreach ($crumbs as $c) {
            $out .= '<span aria-hidden="true">/</span>';
            $out .= isset($c[1])
                ? '<a href="' . htmlspecialchars($c[1]) . '">' . htmlspecialchars($c[0]) . '</a>'
                : '<span aria-current="page">' . htmlspecialchars($c[0]) . '</span>';
        }
        return $out . '</nav>';
    }
}

/** Pfeil-Icon für Textlinks: 'right' (intern) oder 'up-right' (extern). */
if (!function_exists('v01_arrow')) {
    function v01_arrow(string $dir = 'right'): string {
        $path = $dir === 'up-right'
            ? '<path d="M17 7l-10 10"></path><path d="M8 7l9 0l0 9"></path>'
            : '<path d="M5 12l14 0"></path><path d="M13 18l6 -6"></path><path d="M13 6l6 6"></path>';
        return '<svg class="v01-icon" aria-hidden="true" focusable="false" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
    }
}

$robots   = $robots   ?? 'noindex,nofollow';
$metaTitle = $metaTitle ?? 'Prof. Dr. Lisa Yashodhara Haller';
$metaDesc  = $metaDesc  ?? 'Forschung, Beratung und Bildung rund um die Themen Sozialpolitik, Elternschaft und Geschlecht.';
$navActive = $navActive ?? '';
$e = static fn(string $s): string => htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#950000">
<title><?= $e($metaTitle) ?></title>
<meta name="description" content="<?= $e($metaDesc) ?>">
<meta name="robots" content="<?= $e($robots) ?>">

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">

<meta property="og:locale" content="de_DE">
<meta property="og:site_name" content="Prof. Dr. Lisa Yashodhara Haller">
<meta property="og:type" content="website">
<meta property="og:title" content="<?= $e($metaTitle) ?>">
<meta property="og:description" content="<?= $e($metaDesc) ?>">
<?php /* OG-Bilder liegen in images/og/ (1200×630, JPG); Seiten setzen $ogImg = Dateiname, z. B. 'og_profile.jpg' */ ?>
<meta property="og:image" content="https://www.lisa-yashodhara-haller.de/images/og/<?= $e($ogImg ?? 'og_startseite.jpg') ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:type" content="image/jpeg">

<link rel="preload" href="/fonts/v01/public-sans-latin.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="/fonts/v01/newsreader-latin.woff2" as="font" type="font/woff2" crossorigin>
<link rel="stylesheet" href="<?= asset('/fonts/v01/fonts.css') ?>">
<link rel="stylesheet" href="<?= asset('/css/v01.css') ?>">
<script src="<?= asset('/js/v01-nav.js') ?>" defer></script>
<script src="<?= asset('/js/email.js') ?>" defer></script>
</head>
<body class="v01">
<a class="v01-skip" href="#inhalt">Zum Hauptinhalt springen</a>
<?php include __DIR__ . '/navi.php'; ?>
<main id="inhalt">
