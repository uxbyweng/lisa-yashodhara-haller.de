/* Relaunch v01: YouTube-Videos direkt auf der Seite abspielen (Zwei-Klick-Lösung, youtube-nocookie.com).
   Genutzt auf Presse und Medien und auf Projektseiten mit Videos.
   Ohne JavaScript bleiben die Links zu YouTube erhalten. */
(function () {
    "use strict";

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
})();
