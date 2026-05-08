# lisa-yashodhara-haller.de

Personal academic website for **Prof. Dr. Lisa Yashodhara Haller**, professor of social policy with a focus on parenthood, gender dynamics, and family policy. Built with PHP, Bootstrap 5, and vanilla JS – no CMS, hosted on Apache.

Live: [https://www.lisa-yashodhara-haller.de](https://www.lisa-yashodhara-haller.de)

---

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP (no CMS, no framework) |
| Frontend | Bootstrap 5, Vanilla JS, jQuery 3.5.1 |
| Server | Apache, `.htaccess` |
| Deployment | FTP upload |
| Language | German (`de_DE`) |

---

## Pages

| URL | Description |
|---|---|
| `/` | Home – intro, topic overview, latest news |
| `/about/` | Biography and academic profile |
| `/projects/` | Research projects |
| `/publications/` | Books, articles, and papers |
| `/talks-and-workshops/` | Talks, keynotes, and workshops |
| `/press/` | Press appearances and media coverage |
| `/aktuelles/` | Current news and commentary |
| `/media/` | Video and audio recordings |
| `/contact/` | Contact form (AJAX, PHP mailer) |
| `/imprint/` | Legal notice (Impressum) |
| `/privacy/` | Privacy policy (Datenschutz) |
| `/error/` | Custom 404 error page |

---

## Folder Structure

```
lisa-yashodhara-haller.de/
├── about/                  # About page
├── aktuelles/              # News / current topics
├── components/             # Reusable PHP components
│   ├── breadcrumb.php
│   ├── gallery_component.php
│   └── youtube_video.php
├── contact/                # Contact page + PHP mailer
│   ├── index.php
│   └── contact.php
├── courses/                # Courses page
├── css/                    # Stylesheets
│   ├── style.css           # Main styles
│   ├── responsive.css      # Responsive breakpoints
│   ├── framework.css       # Layout framework
│   ├── navbar.css          # Navigation styles
│   ├── custom-animation.css
│   └── fontawesome/        # Icon font (brands, solid, regular)
├── downloads/              # Publicly downloadable PDFs
├── error/                  # Custom 404 page
├── images/                 # Site images (WebP, AVIF, JPG, PNG, SVG)
├── imprint/                # Imprint (Impressum)
├── includes/               # Shared PHP includes
│   ├── header.php          # <head>, meta, OG, Schema.org
│   ├── footer.php          # Footer, social links, JS includes
│   ├── navi.php            # Navigation
│   └── auth.php            # HTTP Basic Auth helper (optional)
├── js/                     # Custom JavaScript
│   ├── theme.js            # Core interactions (AJAX form, scroll, etc.)
│   ├── email.js            # Obfuscated email assembly
│   ├── cookie-consent.js   # Cookie consent banner
│   ├── menu.js             # Mobile menu behaviour
│   ├── moreless.js         # Show more / show less toggle
│   └── setimglazy.js       # Lazy-load image helper
├── media/                  # Media page (video/audio)
├── press/                  # Press page
├── privacy/                # Privacy policy
├── projects/               # Research projects
├── publications/           # Publications list
├── talks-and-workshops/    # Talks and workshops
├── vendor/                 # Third-party libraries (local, no CDN)
│   ├── jquery.min.js       # jQuery 3.5.1
│   ├── bootstrap/          # Bootstrap 5
│   ├── slick/              # Slick Slider
│   ├── fancybox/           # FancyBox lightbox
│   ├── isotope.pkgd.min.js # Isotope layout
│   ├── wow/                # WOW.js scroll animations
│   ├── jquery.lazy.min.js  # Lazy loading
│   └── ...
├── .env                    # Credentials (not committed)
├── .gitignore
├── .htaccess               # Apache config (redirects, caching, security)
├── index.php               # Home page
├── router.php              # Local dev router
└── sitemap.xml
```

---

## Local Development

**Requirements:** PHP installed and available in your terminal.

```bash
php -v
```

**Start local server** from the project root:

```bash
php -S localhost:8000 router.php
```

Then open [http://localhost:8000](http://localhost:8000) in your browser.

`router.php` handles clean URL routing: directory requests resolve to their `index.php`, existing files are served directly, and anything else returns a 404. This mirrors the Apache `.htaccess` behaviour locally.

Example URLs that work locally:

```
http://localhost:8000/
http://localhost:8000/about/
http://localhost:8000/contact/
http://localhost:8000/publications/
```

---

## Deployment

Deployment is done via **FTP upload** to the Apache web server. There is no build step — all assets are pre-compiled and committed.

After uploading, verify `.env` is present on the server (it is not committed to the repository) and that `.htaccess` is active.

---

## Environment Variables

Sensitive credentials (e.g. contact form email address) are stored in a `.env` file in the project root. This file is excluded from version control via `.gitignore`.

Copy the template and fill in your values:

```bash
# .env
CONTACT_MAIL=your@email.com
```

---

## Repository

[https://github.com/uxbyweng/lisa-yashodhara-haller.de](https://github.com/uxbyweng/lisa-yashodhara-haller.de)
