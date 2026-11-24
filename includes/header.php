<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/auth.php';
// require_auth(); // Bei Bedarf einkommentieren, um eine Seite mit HTTP-Basic-Auth zu schützen

// Einbindung der Gallery-, Breadcrumb- und Youtube Component
require_once( $_SERVER[ "DOCUMENT_ROOT" ] . "/components/gallery_component.php" );
require_once( $_SERVER[ "DOCUMENT_ROOT" ] . "/components/breadcrumb.php" );
require_once( $_SERVER[ "DOCUMENT_ROOT" ] . "/components/youtube_video.php" );

// Cache-Busting: hängt die Änderungszeit der Datei als ?v= an (CSS/JS haben 1 Jahr Cache).
// Ändert sich die Datei auf dem Server, ändert sich die URL, und Besucher laden die neue Version.
if (!function_exists('asset')) {
    function asset(string $path): string {
        $file = $_SERVER['DOCUMENT_ROOT'] . $path;
        return is_file($file) ? $path . '?v=' . filemtime($file) : $path;
    }
}
?>
<!DOCTYPE html>

<html lang="de">
    
<head>
<?php /* TECHNISCHE META-ANGABEN, WICHTIG FÜR DIE DARSTELLUNG IM BROWSER */ ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="theme-color" content="#950000">
<meta name="msapplication-navbutton-color" content="#950000">
<meta name="apple-mobile-web-app-status-bar-style" content="#950000">
	
<?php /*  SITENTITEL, -BESCHREIBUNG UND -KEYWORDS */ ?>
<title><?= isset ($metaTitle) ? $metaTitle : "Prof. Dr. Lisa Yashodhara Haller" ?></title> 
<meta name="description" content="<?= isset ($metaDesc) ? $metaDesc :  'Forschung, Beratung und Bildung rund um die Themen Sozialpolitik, Elternschaft und Geschlecht.' ?>" />
<meta name="robots" content="index,follow" />
	
<?php /* FAVICON */ ?>
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#00aba9">
<meta name="theme-color" content="#ffffff">
	
<?php /* OPEN GRAPH */ ?>
<meta property="og:locale" content="de_DE" />
<meta property="og:site_name" content="Prof. Dr. Lisa Yashodhara Haller" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://www.lisa-yashodhara-haller.de<?php echo rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\'); ?>/" />
<meta property="og:title" content='<?= isset ($metaTitle) ? $metaTitle : "Prof. Dr. Lisa Yashodhara Haller" ?>' />
<meta property="og:description" content="<?= isset ($metaDesc) ? $metaDesc :  'Forschung, Beratung und Bildung rund um die Themen Sozialpolitik, Elternschaft und Geschlecht.' ?>" />
<?php if (isset($ogImg)) : ?>
<meta property="og:image" content="<?= htmlspecialchars($ogImg, ENT_QUOTES, 'UTF-8') ?>" />
<?php else : /* Standard-Vorschaubild: vorhandene Datei, Maße/Typ passen zur Datei */ ?>
<meta property="og:image" content="https://www.lisa-yashodhara-haller.de/images/home/about_lisa_501x620_sw.jpg" />
<meta property="og:image:width" content="501" />
<meta property="og:image:height" content="620" />
<meta property="og:image:type" content="image/jpeg" />
<?php endif; ?>
    
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Person",
  "name": "Prof. Dr. rer. pol. Lisa Yashodhara Haller",
  "jobTitle": "Professorin für Sozialpolitik",
  "description": "Professorin für Sozialpolitik mit Schwerpunkt Elternschaft, Geschlecht und Familie. Forschung, Beratung und Bildung zu Familienpolitik, Geschlechterdynamiken und staatlicher Steuerung.",
  "url": "https://www.lisa-yashodhara-haller.de/",
  "sameAs": [
    "https://www.linkedin.com/in/dr-lisa-yashodhara-haller-22122699/",
    "https://www.researchgate.net/profile/Lisa-Haller",
    "https://orcid.org/0000-0001-5094-207X"
  ]
}
</script>
<script src="<?= asset('/js/setimglazy.js') ?>" defer></script>
	
<?php /* CANONICAL-TAG (um Duplicate Content zu vermeiden) */ ?>
<link rel="canonical" href="https://www.lisa-yashodhara-haller.de<?php echo dirname($_SERVER['SCRIPT_NAME']); if (dirname($_SERVER['SCRIPT_NAME']) != '/') { echo "/";} ?>" />
    
<?php /* CSS */ ?>
<?php /* Reihenfolge wie früher die @import-Kette in style.css (jetzt parallel statt nacheinander geladen) */ ?>
<link rel="stylesheet" href="/fonts/gordita/stylesheet.css">
<link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= asset('/css/navbar.css') ?>">
<link rel="stylesheet" href="<?= asset('/css/framework.css') ?>">
<link rel="stylesheet" href="/fonts/bootstrap-icons/font-css.css">
<link rel="stylesheet" href="/fonts/font-awesome/css/all.min.css">
<link rel="stylesheet" href="/vendor/fancybox/dist/jquery.fancybox.min.css">
<link rel="stylesheet" href="/vendor/slick/slick.css">
<link rel="stylesheet" href="/vendor/nice-select/nice-select.css">
<link rel="stylesheet" href="<?= asset('/css/style.css') ?>" media="all">
<link rel="stylesheet" href="<?= asset('/css/responsive.css') ?>" media="all">
</head>

<body>
    <div class="main-page-wrapper">
    <?php include( $_SERVER[ "DOCUMENT_ROOT" ] . "/includes/navi.php" ); ?>
    <main>
