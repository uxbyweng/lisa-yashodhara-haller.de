/* Relaunch v01: Format-Filter und „Weitere Beiträge laden“ auf Presse und Medien.
   Ohne JavaScript stehen alle Beiträge im HTML. */
(function () {
    "use strict";
    var STEP = 9;
    // ---- YouTube direkt auf der Seite abspielen (Zwei-Klick-Lösung, youtube-nocookie.com)
    // Ohne JavaScript bleiben die Links zu YouTube erhalten.
    function closeNotices(except) {
        [].slice.call(document.querySelectorAll(".v01-yt__notice")).forEach(function (n) {
            if (n !== except) { n.hidden = true; }
        });
    }

    function playVideo(card) {
        var thumb = card.querySelector(".v01-yt");
        var start = parseInt(card.dataset.ytStart, 10) || 0;
        var iframe = document.createElement("iframe");
        iframe.src = "https://www.youtube-nocookie.com/embed/" + encodeURIComponent(card.dataset.ytId) +
            "?autoplay=1&rel=0" + (start ? "&start=" + start : "");
        iframe.title = "Video: " + (card.dataset.ytTitle || "");
        iframe.allow = "autoplay; encrypted-media; picture-in-picture; fullscreen";
        iframe.allowFullscreen = true;
        iframe.referrerPolicy = "strict-origin-when-cross-origin";
        thumb.textContent = "";
        thumb.appendChild(iframe);
        iframe.focus();
    }

    document.addEventListener("click", function (e) {
        var trigger = e.target.closest("[data-yt-trigger]");
        var card = e.target.closest(".v01-mcard--video");
        if (trigger && card) {
            e.preventDefault();
            var notice = card.querySelector(".v01-yt__notice");
            closeNotices(notice);
            notice.hidden = false;
            notice.querySelector(".v01-yt__accept").focus();
            return;
        }
        if (card && e.target.closest(".v01-yt__accept")) { playVideo(card); return; }
        if (card && e.target.closest(".v01-yt__cancel")) {
            card.querySelector(".v01-yt__notice").hidden = true;
            card.querySelector(".v01-yt__link").focus();
        }
    });

    document.addEventListener("keydown", function (e) {
        if (e.key !== "Escape") { return; }
        var open = document.querySelector(".v01-yt__notice:not([hidden])");
        if (open) {
            open.hidden = true;
            open.closest(".v01-mcard--video").querySelector(".v01-yt__link").focus();
        }
    });

    // ---- Format-Filter und „Weitere Beiträge laden“
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
