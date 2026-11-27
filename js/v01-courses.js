/* Relaunch v01: Semester-Reiter auf der Lehre-Seite. Ohne JavaScript stehen alle Semester untereinander im HTML. */
(function () {
    "use strict";
    var tabs = [].slice.call(document.querySelectorAll(".v01-tab"));
    var panels = [].slice.call(document.querySelectorAll(".v01-panel"));
    if (!tabs.length || !panels.length) { return; }

    function show(id) {
        tabs.forEach(function (t) { t.setAttribute("aria-pressed", t.dataset.panel === id ? "true" : "false"); });
        panels.forEach(function (p) { p.hidden = p.dataset.panel !== id; });
    }

    tabs.forEach(function (t) {
        t.addEventListener("click", function () { show(t.dataset.panel); });
    });
    show(tabs[0].dataset.panel);
})();
