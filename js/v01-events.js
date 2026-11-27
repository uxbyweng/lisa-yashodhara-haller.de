/* Relaunch v01: Format-Filter und „Ältere Veranstaltungen laden“ auf Vorträge und Workshops.
   Ohne JavaScript stehen alle Veranstaltungen im HTML. */
(function () {
    "use strict";
    var STEP = 20;
    var chips = [].slice.call(document.querySelectorAll(".v01-chip[data-type]"));
    var items = [].slice.call(document.querySelectorAll(".v01-ev"));
    var years = [].slice.call(document.querySelectorAll(".v01-evyear"));
    var more = document.getElementById("v01-more");
    var btn = document.getElementById("v01-more-btn");
    var count = document.getElementById("v01-more-count");
    if (!chips.length || !items.length || !more || !btn) { return; }

    var type = "alle";
    var shown = STEP;

    function render() {
        var matching = items.filter(function (li) { return type === "alle" || li.dataset.type === type; });
        items.forEach(function (li) { li.hidden = true; });
        matching.slice(0, shown).forEach(function (li) { li.hidden = false; });
        years.forEach(function (y) { y.hidden = !y.querySelector(".v01-ev:not([hidden])"); });
        more.hidden = matching.length <= shown;
        count.textContent = Math.min(shown, matching.length) + " von " + matching.length + " Veranstaltungen";
    }

    chips.forEach(function (chip) {
        chip.addEventListener("click", function () {
            type = chip.dataset.type;
            shown = STEP;
            chips.forEach(function (c) { c.setAttribute("aria-pressed", c === chip ? "true" : "false"); });
            render();
        });
    });

    btn.addEventListener("click", function () {
        var before = items.filter(function (li) { return !li.hidden; }).length;
        shown += STEP;
        render();
        var next = items.filter(function (li) { return !li.hidden; })[before];
        if (next) {
            next.setAttribute("tabindex", "-1");
            next.focus();
        }
    });

    render();
})();
