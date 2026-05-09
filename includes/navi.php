<!-- 
=============================================
    Main Menu
============================================== 
-->
<header class="theme-main-menu sticky-menu theme-menu-one">
    <div class="inner-content position-relative">
        <div class="d-flex align-items-center justify-content-between">
            <a href="/" class="d-block" aria-label="Link zur Startseite">
                <img src="/images/svg/logo.svg" alt="Logo: Prof. Dr. Lisa Yashodhara Haller" width="301" height="58" class="img-responsive">
            </a>

            <!-- Mobile Content -->
            <div class="right-widget d-flex align-items-center order-lg-3">
                <a href="/contact/" class="btn-one fs-16 fw-500 text-white d-none d-lg-block" aria-label="Zur Kontaktseite">
                    Kontakt
                </a>
            </div>
            <!-- /.right-widget -->

            <nav class="navbar navbar-expand-lg order-lg-2">
                <button class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" aria-label="Menu"> <span></span> </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="d-block d-lg-none">
                            <a href="/" class="d-block" aria-label="Link zur Startseite">
                                <img src="/images/svg/logo.svg" alt="Logo: Prof. Dr. Lisa Yashodhara Haller" width="301" height="58" class="img-responsive">
                            </a>
                        </li>
                        <li class="nav-item<?php if (dirname($_SERVER['SCRIPT_NAME']) == '/') {
                                                echo " active";
                                            } ?>">
                            <a class="nav-link" href="/" role="button">Home</a>
                        </li>
                        <li class="nav-item<?php if (dirname($_SERVER['SCRIPT_NAME']) == '/about') {
                                                echo " active";
                                            } ?>">
                            <a class="nav-link" href="/about/" role="button">
                                About
                            </a>
                        </li>
                        <li class="nav-item dropdown<?php if (
                                                        (dirname($_SERVER['SCRIPT_NAME']) == '/projects') or
                                                        (dirname($_SERVER['SCRIPT_NAME']) == '/publications') or
                                                        (dirname($_SERVER['SCRIPT_NAME']) == '/press')
                                                    ) {
                                                        echo " active";
                                                    } ?>">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" aria-label="Dropdown Menu: Forschung">
                                Forschung
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/projects/" class="dropdown-item">
                                        <span>Projekte</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/publications/" class="dropdown-item">
                                        <span>Publikationen</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/press/" class="dropdown-item">
                                        <span>Presse</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown<?php if (
                                                        (dirname($_SERVER['SCRIPT_NAME']) == '/talks-and-workshops') or
                                                        (dirname($_SERVER['SCRIPT_NAME']) == '/courses') or
                                                        (dirname($_SERVER['SCRIPT_NAME']) == '/media')
                                                    ) {
                                                        echo " active";
                                                    } ?>">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" aria-label="Dropdown Menu: Lehre">
                                <span>Lehre</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/talks-and-workshops/" class="dropdown-item">
                                        <span>Vorträge & Workshops</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/courses/" class="dropdown-item">
                                        <span>Lehrveranstaltungen</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/media/" class="dropdown-item">
                                        <span>Zum anschauen (Clips)</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Mobile Content -->
                        <li class="mobile-content d-block d-lg-none">
                            <div class="d-flex flex-column align-items-center justify-content-center mt-70">
                                <a href="/contact/" class="btn-one fs-16 fw-500 text-white">
                                    Kontakt
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>