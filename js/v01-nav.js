/* Relaunch v01: Mobilmenü (ohne jQuery/Bootstrap). Ohne JS bleibt die Navigation sichtbar. */
(function () {
    "use strict";
    document.documentElement.classList.add("v01-js");

    var toggle = document.querySelector(".v01-nav__toggle");
    var list = document.getElementById("v01-nav-list");
    var nav = document.querySelector(".v01-nav");
    if (!toggle || !list || !nav) { return; }

    function setOpen(open) {
        list.classList.toggle("is-open", open);
        nav.classList.toggle("is-open-wrap", open);
        toggle.setAttribute("aria-expanded", open ? "true" : "false");
        toggle.textContent = open ? "Schließen" : "Menü";
    }

    toggle.addEventListener("click", function () {
        setOpen(toggle.getAttribute("aria-expanded") !== "true");
    });

    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape" && toggle.getAttribute("aria-expanded") === "true") {
            setOpen(false);
            toggle.focus();
        }
    });
})();
