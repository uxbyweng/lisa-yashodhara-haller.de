/* Relaunch v01: Zeitraum-Filter auf der Projektübersicht. Ohne JavaScript stehen alle Projekte im HTML. */
(function () {
    "use strict";
    var chips = [].slice.call(document.querySelectorAll(".v01-chip[data-range]"));
    var cards = [].slice.call(document.querySelectorAll(".v01-pcard"));
    if (!chips.length || !cards.length) { return; }

    chips.forEach(function (chip) {
        chip.addEventListener("click", function () {
            var range = chip.dataset.range;
            chips.forEach(function (c) { c.setAttribute("aria-pressed", c === chip ? "true" : "false"); });
            cards.forEach(function (card) { card.hidden = !(range === "alle" || card.dataset.range === range); });
        });
    });
})();
