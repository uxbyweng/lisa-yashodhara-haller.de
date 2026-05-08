<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/auth.php';
// require_auth(); // Bei Bedarf einkommentieren, um eine Seite mit HTTP-Basic-Auth zu schützen

// Einbindung der Gallery-, Breadcrumb- und Youtube Component
require_once( $_SERVER[ "DOCUMENT_ROOT" ] . "/components/gallery_component.php" );
require_once( $_SERVER[ "DOCUMENT_ROOT" ] . "/components/breadcrumb.php" );
require_once( $_SERVER[ "DOCUMENT_ROOT" ] . "/components/youtube_video.php" );
?>
<!DOCTYPE html>

<html lang="de">
    
<head>
<?php /* TECHNISCHE META-ANGABEN, WICHTIG FÜR DIE DARSTELLUNG IM BROWSER */ ?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="/img/lisa-Yashodhara-haller.png" itemprop="image">
<meta name="theme-color" content="#950000">
<meta name="msapplication-navbutton-color" content="#950000">
<meta name="apple-mobile-web-app-status-bar-style" content="#950000">
	
<?php /*  SITENTITEL, -BESCHREIBUNG UND -KEYWORDS */ ?>
<title><?= isset ($metaTitle) ? $metaTitle : "Prof. Dr. Lisa Yashodhara Haller" ?></title> 
<meta name="description" content="<?= isset ($metaDesc) ? $metaDesc :  'Forschung, Beratung und Bildung rund um die Themen Sozialpolitik, Elternschaft und Geschlecht.' ?>" />
<meta name="keywords" content="<?= isset ($metaKeyw) ? $metaKeyw :  'Sozialpolitik, Elternschaft, Geschlecht, Gender, staatliche Steuerung, Kapital, sozialstaatliche Steuerung, Familie, Familienpolitik' ?>" />
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
<meta property="og:url" content="https://www.lisa-yashodhara-haller.de<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/" />
<meta property="og:title" content='<?= isset ($metaTitle) ? $metaTitle : "Prof. Dr. Lisa Yashodhara Haller" ?>' />
<meta property="og:description" content="<?= isset ($metaDesc) ? $metaDesc :  'Forschung, Beratung und Bildung rund um die Themen Sozialpolitik, Elternschaft und Geschlecht.' ?>" />
<meta property="og:image:width" content="1050" />
<meta property="og:image:height" content="400" />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:image" content="<?= isset ($ogImg) ? $ogImg : 'https://www.lisa-yashodhara-haller.de/img/og_lisa-haller.jpg' ?>" />
    
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
<script src="/js/setimglazy.js" defer></script>
	
<?php /* CANONICAL-TAG (um Duplicate Content zu vermeiden) */ ?>
<link rel="canonical" href="https://www.lisa-yashodhara-haller.de<?php echo dirname($_SERVER['SCRIPT_NAME']); if (dirname($_SERVER['SCRIPT_NAME']) != '/') { echo "/";} ?>" />
    
<?php /* CSS */ ?>
<style>
    body {
        background-color: #faf5ec;
        font-family: 'gordita';
        font-weight: normal;
        font-size: 16px;
        position: relative;
        color: var(--text-color);
    }
    .main-page-wrapper {
        overflow-x: hidden;
    }
    .pt-200 {
        padding-top: 200px;
    }
    .position-relative {
        position: relative!important;
    }
    h1.main-title {
        color: var(--title-color);
        font-weight: 700 !important;
    }
    .main-title>span {
        display: inline-block;
        position: relative;
        z-index: 1;
    }
    .mb-40 {
        margin-bottom: 40px;
    }
    .h1, h1 {
        font-size: 60px;
        line-height: 1.18em;
    }
    p {
        font-size: 1.25rem;
        line-height: 1.40em;
    }
    p {
        margin-top: 0;
        margin-bottom: 1rem;
    }
</style>
<link rel="stylesheet" type="text/css" href="/css/style.css" media="all">
<link rel="stylesheet" type="text/css" href="/css/responsive.css" media="all">
</head>

<body>
    <div class="main-page-wrapper">
    <?php include( $_SERVER[ "DOCUMENT_ROOT" ] . "/includes/navi.php" ); ?>
