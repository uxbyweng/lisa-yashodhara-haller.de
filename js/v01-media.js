/* Relaunch v01: Format-Filter und „Weitere Beiträge laden“ auf Presse und Medien.
   Ohne JavaScript stehen alle Beiträge im HTML. */
(function () {
    "use strict";
    var STEP = 9;
    var chips = [].slice.call(document.querySelectorAll(".v01-chip[data-kind]"));
    var items = [].slice.call(document.querySelectorAll(".v01-mitem"));
    var more = document.getElementById("v01-more");
    var btn = document.getElementById("v01-more-btn");
    var count = document.getElementById("v01-more-count");
    if (!chips.length || !items.length || !more || !btn) { return; }

    var kind = "alle";
    var shown = STEP;

    function render() {
        var matching = items.filter(function (li) { return kind === "alle" || li.dataset.kind === kind; });
        items.forEach(function (li) { li.hidden = true; });
        matching.slice(0, shown).forEach(function (li) { li.hidden = false; });
        var visible = Math.min(shown, matching.length);
        more.hidden = matching.length <= shown;
        count.textContent = visible + " von " + matching.length + " Beiträgen";
    }

    chips.forEach(function (chip) {
        chip.addEventListener("click", function () {
            kind = chip.dataset.kind;
            shown = STEP;
            chips.forEach(function (c) { c.setAttribute("aria-pressed", c === chip ? "true" : "false"); });
            render();
        });
    });

    btn.addEventListener("click", function () {
        var firstNew = items.filter(function (li) { return !li.hidden; }).length;
        shown += STEP;
        render();
        var visibleItems = items.filter(function (li) { return !li.hidden; });
        var target = visibleItems[firstNew];
        if (target) {
            var link = target.querySelector("a");
            if (link) { link.focus({ preventScroll: false }); }
        }
    });

    render();
})();
