# GT HOMES Holiday Resort — Website

**GT HOMES Holiday Resort (Pvt) Ltd**  
*Your Perfect Escape*

---

## Project Purpose

A professional, production-oriented website for GT HOMES Holiday Resort.

The public website allows visitors to:
- Browse rooms, suites, and packages
- View dining and menu information
- Explore resort experiences (swimming pool, mini cinema, activities)
- Browse the Memories and Special Memories gallery
- Read about GT HOMES
- View contact information
- Submit booking enquiries (via form, WhatsApp, or email)

There is **no online payment gateway**, **no customer login**, and **no customer dashboard**.

Bookings and communication happen through:
1. **WhatsApp** — click-to-chat with a pre-filled message
2. **Email** — enquiry form submissions delivered to the admin inbox

---

## Technology Stack

| Layer     | Technology |
|-----------|-----------|
| Server    | Apache + XAMPP |
| Language  | PHP 8+ (`declare(strict_types=1)`) |
| Database  | MySQL 8 via PDO prepared statements |
| Frontend  | Vanilla HTML5 / CSS3 / JavaScript |
| CSS       | Custom design system (no Bootstrap, no Tailwind) |
| JS        | Vanilla JS only (no jQuery, no frameworks) |
| Fonts     | Google Fonts (Playfair Display, Plus Jakarta Sans, Inter) |
| Icons     | Font Awesome 6.4.0 |

---

## Architecture

This project follows a strict **N-Tier MVC Architecture**:

```
Browser
  ↓
Entry Point (e.g. index.php)
  ↓
Controller (receives request, validates CSRF, sanitises input)
  ↓
BLL — Business Logic Layer (validates rules, transforms data)
  ↓
DAL — Data Access Layer (ALL SQL, PDO prepared statements only)
  ↓
PDO → MySQL
  ↓
Response (view rendered / JSON returned)
```

### Layer Rules

- **Controllers** — never contain SQL or business logic
- **BLL** — never contains SQL, never accesses `$_POST` directly
- **DAL** — all SQL lives here; only PDO prepared statements
- **Views** — only presentation; all output escaped via `e()`
- **Services** — reusable cross-cutting concerns (Email, WhatsApp, CSRF, Auth, Upload)

---

## Directory Structure

```
GT-Homes/
├── index.php               ← Homepage
├── rooms.php               ← Room listing
├── room_details.php        ← Room detail
├── dining.php              ← Dining/Menu
├── experiences.php         ← Pool, Cinema, Activities
├── gallery.php             ← Memories gallery
├── about.php               ← About page
├── contact.php             ← Contact + form
├── booking.php             ← Booking enquiry form
├── login.php               ← Admin login (not linked publicly)
├── logout.php              ← Admin logout
├── admin_dashboard.php     ← Admin dashboard (protected)
├── api_check_availability.php
├── api_booking_enquiry.php
│
├── .htaccess               ← Clean URLs + security
├── .gitignore
├── README.md
│
├── config/
│   ├── app.php             ← Application constants
│   ├── db.php              ← PDO database connection
│   ├── mail.php            ← Mail configuration
│   └── init.php            ← Bootstrap (loaded by every entry point)
│
├── controllers/
│   ├── BaseController.php
│   ├── HomeController.php
│   ├── RoomController.php
│   ├── DiningController.php
│   ├── ExperienceController.php
│   ├── GalleryController.php
│   ├── BookingController.php
│   ├── ContactController.php
│   ├── AuthController.php
│   └── AdminDashboardController.php
│
├── bll/
│   ├── BaseBLL.php
│   ├── RoomBLL.php
│   ├── DiningBLL.php
│   ├── ExperienceBLL.php
│   ├── GalleryBLL.php
│   ├── BookingBLL.php
│   ├── ContactBLL.php
│   └── AuthBLL.php
│
├── dal/
│   ├── BaseDAL.php
│   ├── RoomDAL.php
│   ├── DiningDAL.php
│   ├── ExperienceDAL.php
│   ├── GalleryDAL.php
│   ├── BookingDAL.php
│   └── UserDAL.php
│
├── services/
│   ├── LoggerService.php
│   ├── CsrfService.php
│   ├── AuthService.php
│   ├── EmailService.php
│   ├── WhatsAppService.php
│   └── FileUploadService.php
│
├── helpers/
│   ├── security_helper.php
│   ├── auth_helper.php
│   ├── url_helper.php
│   ├── validation_helper.php
│   ├── view_helper.php
│   └── format_helper.php
│
├── views/
│   ├── public/             ← Public page views
│   ├── admin/              ← Admin panel views
│   ├── auth/               ← Login page
│   ├── partials/           ← Header, footer, sidebar
│   └── errors/             ← 403, 404, 500
│
├── assets/
│   ├── css/                ← variables, reset, global, components, public, admin, auth, responsive
│   ├── js/                 ← main, booking, gallery, admin, validation
│   └── images/             ← branding, rooms, dining, experiences, gallery, placeholders
│
├── storage/
│   ├── logs/               ← app.log, mail.log
│   ├── uploads/            ← Admin uploaded images
│   └── temp/
│
└── database/
    ├── schema.sql
    ├── seed.sql
    └── README.md
```

---

## XAMPP Setup Instructions

### 1. Copy the Project

```
C:\xampp\htdocs\GT-Homes\
```

### 2. Start Services

Open XAMPP Control Panel and start:
- **Apache**
- **MySQL**

### 3. Enable mod_rewrite (if not already enabled)

In `C:\xampp\apache\conf\httpd.conf`, ensure this line is **uncommented**:

```apache
LoadModule rewrite_module modules/mod_rewrite.so
```

Also ensure `AllowOverride All` is set for the `htdocs` directory block:

```apache
<Directory "C:/xampp/htdocs">
    AllowOverride All
</Directory>
```

Restart Apache after changes.

### 4. Create the Database

Open **phpMyAdmin** (http://localhost/phpmyadmin) or MySQL CLI:

```sql
CREATE DATABASE gt_homes
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;
```

### 5. Import the Schema

```sql
USE gt_homes;
SOURCE C:/xampp/htdocs/GT-Homes/database/schema.sql;
```

### 6. Create the Admin User

Generate a bcrypt password hash:

```bash
php -r "echo password_hash('YourStrongPassword123!', PASSWORD_DEFAULT);"
```

Then insert the admin user (or update `database/seed.sql` and import it):

```sql
INSERT INTO users (name, email, password_hash, role, is_active)
VALUES ('GT HOMES Admin', 'admin@gthomes.lk', 'PASTE_HASH_HERE', 'admin', 1);
```

### 7. Configure the Application

Review `config/app.php` — the defaults target `http://localhost/GT-Homes`.

Review `config/db.php` — default XAMPP credentials (root / no password) are pre-set.

Review `config/mail.php` — update admin email addresses.

---

## URL Examples

| URL | Maps to |
|-----|---------|
| `http://localhost/GT-Homes/` | Homepage |
| `http://localhost/GT-Homes/rooms` | Room listing |
| `http://localhost/GT-Homes/room/orchid` | Room detail (slug: orchid) |
| `http://localhost/GT-Homes/dining` | Dining page |
| `http://localhost/GT-Homes/experiences` | Experiences |
| `http://localhost/GT-Homes/gallery` | Gallery |
| `http://localhost/GT-Homes/about` | About |
| `http://localhost/GT-Homes/contact` | Contact form |
| `http://localhost/GT-Homes/booking` | Booking enquiry |
| `http://localhost/GT-Homes/login` | **Admin login (private)** |
| `http://localhost/GT-Homes/admin` | Admin dashboard (protected) |

---

## Admin Login

**URL:** `http://localhost/GT-Homes/login`

> ⚠️ This URL is **never linked** from the public website. Visitors cannot discover it through navigation.

The login form is CSRF-protected. Sessions are secured with:
- `httponly` cookie
- `SameSite=Lax`
- Session ID regeneration on login
- Session destruction on logout

---

## Security Implementation

| Feature | Implementation |
|---------|---------------|
| SQL Injection | PDO prepared statements throughout |
| XSS | All output via `e()` → `htmlspecialchars()` |
| CSRF | Token in session, validated on every POST |
| Passwords | `password_hash()` / `password_verify()` |
| Sessions | httponly, SameSite=Lax, regenerate on login |
| Admin protection | `requireAdmin()` called in constructor |
| File uploads | MIME detection via finfo, unique filenames |
| Error display | Dev: detailed | Prod: generic |
| Directory listing | `Options -Indexes` in .htaccess |

---

## WhatsApp Booking

The WhatsApp integration uses standard **click-to-chat** only:

```
https://wa.me/94777872280?text=<url-encoded-message>
```

All WhatsApp links are generated exclusively by `services/WhatsAppService.php`.  
The phone number is configured once in `config/app.php` as `WHATSAPP_NUMBER`.

No unofficial WhatsApp API is used.

---

## Email

Email is sent via PHP's native `mail()` function.  
All mail configuration lives in `config/mail.php`.  
Failed email attempts are logged to `storage/logs/mail.log`.  
The service is implemented in `services/EmailService.php`.

---

## Development Roadmap

- **Step 1** ✅ — Architecture, configuration, security foundation, placeholder pages
- **Step 2** — Room management (admin CRUD + public display)
- **Step 3** — Dining & Experiences modules
- **Step 4** — Gallery / Memories module
- **Step 5** — Booking enquiry workflow (complete)
- **Step 6** — Admin dashboard statistics & reports
- **Step 7** — Website Settings module
- **Step 8** — Production deployment configuration

---

*GT HOMES Holiday Resort (Pvt) Ltd — Confidential. Internal use only.*
