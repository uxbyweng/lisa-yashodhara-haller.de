/* Relaunch v01: Suche, Art-Filter und „Literaturangabe kopieren“ für die Publikationsliste.
   Ergänzung: Alle Einträge stehen auch ohne JavaScript im HTML. */
(function () {
    "use strict";
    var search = document.getElementById("v01-pub-search");
    var chips = [].slice.call(document.querySelectorAll(".v01-chip"));
    var items = [].slice.call(document.querySelectorAll(".v01-pub"));
    var years = [].slice.call(document.querySelectorAll(".v01-pubyear"));
    var count = document.getElementById("v01-pub-count");
    var none = document.getElementById("v01-pub-none");
    var reset = document.getElementById("v01-pub-reset");
    if (!search || !items.length) { return; }

    var type = "alle";

    function apply() {
        var q = search.value.trim().toLowerCase();
        var shown = 0;
        items.forEach(function (li) {
            var ok = (type === "alle" || li.dataset.type === type) &&
                     (q === "" || li.dataset.search.indexOf(q) !== -1);
            li.hidden = !ok;
            if (ok) { shown++; }
        });
        years.forEach(function (y) {
            y.hidden = !y.querySelector(".v01-pub:not([hidden])");
        });
        count.textContent = shown === 1 ? "1 Eintrag" : shown + " Einträge";
        none.hidden = shown !== 0;
    }

    chips.forEach(function (chip) {
        chip.addEventListener("click", function () {
            type = chip.dataset.filter;
            chips.forEach(function (c) { c.setAttribute("aria-pressed", c === chip ? "true" : "false"); });
            apply();
        });
    });
    search.addEventListener("input", apply);
    if (reset) {
        reset.addEventListener("click", function () {
            search.value = "";
            type = "alle";
            chips.forEach(function (c) { c.setAttribute("aria-pressed", c.dataset.filter === "alle" ? "true" : "false"); });
            apply();
            search.focus();
        });
    }

    // Literaturangabe kopieren (nur mit Clipboard-API)
    if (navigator.clipboard && navigator.clipboard.writeText) {
        items.forEach(function (li) {
            var cite = li.querySelector("[data-cite]");
            var actions = li.querySelector(".v01-pub__actions");
            if (!cite) { return; }
            if (!actions) {
                actions = document.createElement("div");
                actions.className = "v01-pub__actions";
                li.appendChild(actions);
            }
            var btn = document.createElement("button");
            btn.type = "button";
            btn.className = "v01-iconbtn v01-iconbtn--text";
            btn.title = "Literaturangabe kopieren";
            btn.innerHTML = '<svg aria-hidden="true" focusable="false" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z"></path><path d="M4.012 16.737a2.005 2.005 0 0 1 -1.012 -1.737v-10c0 -1.1 .9 -2 2 -2h10c.75 0 1.158 .385 1.5 1"></path></svg><span class="v01-iconbtn__label">Zitieren</span><span class="v01-sr"> Literaturangabe kopieren</span>';
            btn.addEventListener("click", function () {
                navigator.clipboard.writeText(cite.dataset.cite).then(function () {
                    var label = btn.querySelector(".v01-iconbtn__label");
                    label.textContent = "Kopiert";
                    setTimeout(function () { label.textContent = "Zitieren"; }, 1800);
                });
            });
            actions.insertBefore(btn, actions.firstChild);
        });
    }
})();
