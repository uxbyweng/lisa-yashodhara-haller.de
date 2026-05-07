// email.js
document.addEventListener('DOMContentLoaded', function () {
    var mailAddresses = document.querySelectorAll('.mailaddress');
    mailAddresses.forEach(function(mailAddress) {
        var name = mailAddress.dataset.name;
        var domain = mailAddress.dataset.domain;
        var tld = mailAddress.dataset.tld;
        var emailAddress = name + '@' + domain + '.' + tld;
        mailAddress.setAttribute('href', 'mailto:' + emailAddress);
        mailAddress.textContent = emailAddress;
    });
});