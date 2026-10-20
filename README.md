# Seeds of Sage

A custom-built website for a friend's therapy practice, written from scratch in PHP, HTML, CSS, and MySQL. It has public content pages, a blog and events calendar, a contact form, and an admin dashboard so the owner could manage her own posts and events without touching code.

> **Status:** The client has since moved to a hosted website platform, so the original site is no longer live. This repo is kept as a portfolio piece. All client content has been replaced with placeholder text and sample data, and the contact form runs in demo mode by default.

<!-- Add screenshots or a link to a short walkthrough video here, for example:
![Home page](docs/home.png)
![Admin dashboard](docs/admin.png)
-->

## Features

**Public site**
- Content pages: home, about, approach, services, blog, calendar, and event/post detail pages
- Blog and events pulled from MySQL
- Contact form that posts to the [Web3Forms](https://web3forms.com) API (the API is a third-party service; I did not build it). The first version stored messages in MySQL before I switched to the API so the owner received them by email.
- Responsive layout built on Bootstrap 5.3.3 (loaded from a CDN)

**Admin dashboard**
- Login with `password_hash()` / `password_verify()`; pages are protected by a session check
- Create, edit, and delete blog posts (CRUD)
- Create, edit, and delete events, including weekly or monthly repeating events
- Add and manage admin accounts
- Database writes use prepared statements

## Tech stack

PHP 8, MySQL/MariaDB, HTML, CSS, Bootstrap 5, Apache (`.htaccess` rewrites so `/about` serves `about.php`)

## Running it locally

These steps assume [XAMPP](https://www.apachefriends.org/) (Apache + MySQL + PHP).

1. **Place the project** in your web root so it lives at `htdocs/SeedsOfSage/`.
2. **Start Apache and MySQL** in the XAMPP control panel.
3. **Create a database** named `seedsofsage` in phpMyAdmin (`http://localhost/phpmyadmin`).
4. **Import the schema, then the sample data:** import `schema.sql` into that database, then `seed.sql`.
5. **Create your config file** by copying the template:
   ```
   admin/config/constants.example.php  ->  admin/config/constants.php
   ```
   The defaults match a stock XAMPP install (user `root`, empty password, database `seedsofsage`). Change them if yours differ. `constants.php` is in `.gitignore`, so real credentials never get committed.
6. **Check `HOMEPAGE`** in `constants.php`. It must match how you open the site, including `http` vs `https` and the folder name (default: `http://localhost/SeedsOfSage/`).
7. **Open** `http://localhost/SeedsOfSage/`.

### Admin login

Go to `http://localhost/SeedsOfSage/admin/login.php` and sign in with the demo account:

| Username | Password |
|----------|----------|
| `demo` | `demo-password-123` |

This account only exists in the sample data. Change or delete it if you ever deploy this anywhere real.

## Demo mode and the contact form

`DEMO_MODE` in `constants.php` is `true` by default. In demo mode the contact form posts to `contact-demo.php`, which validates and thanks the visitor but sends nothing, and no API key is written into the page.

To use the real form:

1. Get a free access key at [web3forms.com](https://web3forms.com).
2. In `constants.php`, set `DEMO_MODE` to `false` and put your key in `CONTACT_API_KEY`.

Treat the key as tied to the email address it delivers to, and keep it out of version control.

## Project layout

```
.
├── index.php, about.php, services.php, blog.php, calendar.php, ...   public pages
├── contactform.php, contact-demo.php                                  contact form and its demo handler
├── partials/                                                          shared header, footer, calendar helper
├── admin/
│   ├── login.php, logout.php                                          authentication
│   ├── manage-*.php                                                   dashboard lists (admins, posts, events)
│   ├── add-*.php, update-*.php, delete-*.php                          forms and actions
│   ├── validate-new-*.php                                             server-side validation and inserts
│   ├── partials/                                                      admin navbar, footer, check-login.php
│   └── config/constants.example.php                                   config template
├── images/
├── schema.sql                                                         table structure (no data)
└── seed.sql                                                           sample posts, events, and demo admin
```

## Known limitations

This was my first full-stack project, and the code shows it. Things I would do differently now:

- **Duplicated markup.** Some pages have separate mobile and desktop blocks instead of a single responsive layout driven by CSS.
- **HTML stored in the database.** Line breaks in posts and events are converted to `<br />` before saving. Storing the raw text and applying `nl2br(htmlspecialchars(...))` when displaying is cleaner and safer.
- **Hard-coded structure.** There is no router or templating layer; pages include shared partials directly.
- **No CSRF tokens** on the admin forms.
- **Placeholder content.** Text and images are stand-ins for the original client material.

## What I learned

Building a server-rendered site end to end: relational schema design, session-based authentication, prepared statements, integrating a third-party API, and building an admin interface for a non-technical user. I also learned a lot from debugging it again later.
