</main>
<footer class="v01-footer">
    <div class="v01-container v01-footer__inner">
        <div class="v01-footer__cols">
            <div class="v01-footer__col">
                <span class="v01-footer__name">Prof. Dr. Lisa Yashodhara Haller</span>
                <span>Hochschule Neubrandenburg<br>Fachbereich Soziale Arbeit, Bildung und Erziehung</span>
            </div>
            <nav class="v01-footer__col" aria-labelledby="v01-foot-forschung">
                <h2 class="v01-footer__title" id="v01-foot-forschung">Forschung</h2>
                <ul class="v01-footer__list">
                    <li><a href="<?= v01_url('forschung') ?>">Projekte</a></li>
                    <li><a href="<?= v01_url('publikationen') ?>">Publikationen</a></li>
                    <li><a href="<?= v01_url('medien') ?>">Presse &amp; Medien</a></li>
                </ul>
            </nav>
            <nav class="v01-footer__col" aria-labelledby="v01-foot-lehre">
                <h2 class="v01-footer__title" id="v01-foot-lehre">Lehre</h2>
                <ul class="v01-footer__list">
                    <li><a href="<?= v01_url('lehre') ?>">Lehrveranstaltungen</a></li>
                    <li><a href="<?= v01_url('vortraege') ?>">Vorträge &amp; Workshops</a></li>
                </ul>
            </nav>
            <nav class="v01-footer__col" aria-labelledby="v01-foot-profile">
                <h2 class="v01-footer__title" id="v01-foot-profile">Profile</h2>
                <ul class="v01-footer__list">
                    <li><a href="https://orcid.org/0000-0001-5094-207X" target="_blank" rel="noopener noreferrer">ORCID<span class="v01-sr"> (öffnet in neuem Tab)</span></a></li>
                    <li><a href="https://www.researchgate.net/profile/Lisa-Haller" target="_blank" rel="noopener noreferrer">ResearchGate<span class="v01-sr"> (öffnet in neuem Tab)</span></a></li>
                    <li><a href="https://www.linkedin.com/in/dr-lisa-yashodhara-haller-22122699/" target="_blank" rel="noopener noreferrer">LinkedIn<span class="v01-sr"> (öffnet in neuem Tab)</span></a></li>
                </ul>
            </nav>
        </div>
        <div class="v01-footer__bottom">
            <span>© <?= date('Y') ?> Lisa Yashodhara Haller</span>
            <ul class="v01-footer__legal">
                <li><a href="<?= v01_url('kontakt') ?>">Kontakt</a></li>
                <li><a href="<?= v01_url('impressum') ?>">Impressum</a></li>
                <li><a href="<?= v01_url('datenschutz') ?>">Datenschutz</a></li>
            </ul>
        </div>
    </div>
</footer>
</body>
</html>
