/* Relaunch v01: mobiles Vollbild-Menü (ohne jQuery/Bootstrap).
   Ohne JavaScript bleibt die Navigation als Liste unter der Kopfzeile sichtbar. */
(function () {
    "use strict";
    document.documentElement.classList.add("v01-js");

    var toggle = document.querySelector(".v01-nav__toggle");
    var menu = document.getElementById("v01-menu");
    var closeBtn = document.querySelector(".v01-menu__close");
    if (!toggle || !menu || !closeBtn) { return; }

    var mobile = window.matchMedia("(max-width: 860px)");

    function focusables() {
        return [].slice.call(menu.querySelectorAll("a[href], button")).filter(function (el) {
            return el.offsetParent !== null || el === document.activeElement;
        });
    }

    function onKey(e) {
        if (e.key === "Escape") {
            e.preventDefault();
            close();
            return;
        }
        if (e.key !== "Tab") { return; }
        var items = focusables();
        if (!items.length) { return; }
        var first = items[0];
        var last = items[items.length - 1];
        if (e.shiftKey && document.activeElement === first) {
            e.preventDefault();
            last.focus();
        } else if (!e.shiftKey && document.activeElement === last) {
            e.preventDefault();
            first.focus();
        }
    }

    function open() {
        menu.classList.add("is-open");
        menu.setAttribute("role", "dialog");
        menu.setAttribute("aria-modal", "true");
        menu.setAttribute("aria-label", "Hauptmenü");
        toggle.setAttribute("aria-expanded", "true");
        document.documentElement.classList.add("v01-menu-open");
        document.addEventListener("keydown", onKey);
        closeBtn.focus();
    }

    function close() {
        menu.classList.remove("is-open");
        menu.removeAttribute("role");
        menu.removeAttribute("aria-modal");
        menu.removeAttribute("aria-label");
        toggle.setAttribute("aria-expanded", "false");
        document.documentElement.classList.remove("v01-menu-open");
        document.removeEventListener("keydown", onKey);
        toggle.focus();
    }

    toggle.addEventListener("click", open);
    closeBtn.addEventListener("click", close);

    // Wird das Fenster breit (z. B. Drehen des Geräts), Overlay beenden
    function onResize() {
        if (!mobile.matches && menu.classList.contains("is-open")) {
            menu.classList.remove("is-open");
            menu.removeAttribute("role");
            menu.removeAttribute("aria-modal");
            menu.removeAttribute("aria-label");
            toggle.setAttribute("aria-expanded", "false");
            document.documentElement.classList.remove("v01-menu-open");
            document.removeEventListener("keydown", onKey);
        }
    }
    if (mobile.addEventListener) { mobile.addEventListener("change", onResize); } else { mobile.addListener(onResize); }
})();
