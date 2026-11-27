/* Relaunch v01: Kontaktformular (ohne jQuery/Validator).
   Versand per fetch an /contact/contact.php (unveränderter Handler mit CSRF-Prüfung, Honeypots, Rate-Limit, URL-Filter).
   Anliegen und Organisation gehen als Textzeilen vor der Nachricht mit, weil der Handler nur Name, E-Mail und Nachricht kennt.
   Ohne JavaScript sendet das Formular klassisch an denselben Handler (nur Name, E-Mail, Nachricht, Datenschutz). */
(function () {
    "use strict";
    var form = document.getElementById("v01-contact-form");
    if (!form) { return; }

    var area = document.getElementById("v01-form-area");
    var sent = document.getElementById("v01-sent");
    var again = document.getElementById("v01-again");
    var errBox = document.getElementById("v01-form-error");
    var submit = document.getElementById("v01-submit");
    var submitLabel = submit.firstChild.textContent;
    var hints = [].slice.call(form.querySelectorAll(".v01-hint"));
    var topics = [].slice.call(form.querySelectorAll('input[name="topic"]'));

    var MESSAGES = {
        name: "Bitte geben Sie Ihren Namen an.",
        email: "Bitte geben Sie eine gültige E-Mail-Adresse an.",
        message: "Bitte schreiben Sie mir eine Nachricht (mindestens 20 Zeichen, mindestens drei Wörter).",
        privacy: "Bitte bestätigen Sie die Datenschutzerklärung."
    };

    // Hinweis zum gewählten Anliegen
    function showHint() {
        var current = topics.filter(function (t) { return t.checked; })[0];
        hints.forEach(function (h) { h.hidden = !current || h.dataset.topic !== current.value; });
    }
    topics.forEach(function (t) { t.addEventListener("change", showHint); });
    showHint();

    function setError(id, text) {
        var input = document.getElementById("v01-" + id);
        var box = document.getElementById("v01-" + id + "-err");
        if (!input || !box) { return; }
        box.hidden = !text;
        box.textContent = text || "";
        if (text) { input.setAttribute("aria-invalid", "true"); } else { input.removeAttribute("aria-invalid"); }
    }

    function validate() {
        var first = null;
        function check(id, ok) {
            setError(id, ok ? "" : MESSAGES[id]);
            if (!ok && !first) { first = document.getElementById("v01-" + id); }
        }
        var message = form.elements.message.value.trim();
        var words = message.split(/\s+/).filter(Boolean).length;
        check("name", form.elements.name.value.trim() !== "");
        check("email", /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(form.elements.email.value.trim()));
        check("message", message.length >= 20 && words >= 3);
        check("privacy", form.elements.privacy.checked);
        if (first) { first.focus(); }
        return !first;
    }

    function showFormError(text) {
        errBox.textContent = text;
        errBox.hidden = false;
    }

    function setBusy(busy) {
        submit.disabled = busy;
        submit.firstChild.textContent = busy ? "Wird gesendet … " : submitLabel;
    }

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        errBox.hidden = true;
        if (!validate()) { return; }

        // Nachricht um Anliegen und Organisation ergänzen
        var topic = topics.filter(function (t) { return t.checked; })[0];
        var org = form.elements.organisation.value.trim().replace(/[\r\n]+/g, " ");
        var prefix = (topic ? "Anliegen: " + topic.dataset.label + "\n" : "") + (org ? "Organisation: " + org + "\n" : "");
        var data = new FormData(form);
        data.delete("topic");
        data.delete("organisation");
        data.set("message", (prefix ? prefix + "\n" : "") + form.elements.message.value.trim());

        setBusy(true);
        fetch(form.getAttribute("action"), {
            method: "POST",
            body: new URLSearchParams(data),
            credentials: "same-origin",
            headers: { "X-Requested-With": "XMLHttpRequest" }
        }).then(function (r) { return r.json(); }).then(function (res) {
            setBusy(false);
            if (res && res.type === "success") {
                area.hidden = true;
                sent.hidden = false;
                sent.focus();
            } else {
                showFormError((res && res.message) || "Beim Absenden ist ein Fehler aufgetreten. Bitte versuchen Sie es später noch einmal.");
            }
        }).catch(function () {
            setBusy(false);
            showFormError("Beim Absenden ist ein Fehler aufgetreten. Bitte versuchen Sie es später noch einmal.");
        });
    });

    again.addEventListener("click", function () {
        form.reset();
        showHint();
        sent.hidden = true;
        area.hidden = false;
        form.elements.name.focus();
    });
})();
