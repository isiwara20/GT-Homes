-- ============================================================
-- GT HOMES Holiday Resort — Database Schema
-- File: database/schema.sql
-- Engine: InnoDB | Charset: utf8mb4 | Collation: utf8mb4_unicode_ci
--
-- Usage:
--   1. Create database:  CREATE DATABASE gt_homes CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
--   2. Select it:        USE gt_homes;
--   3. Import this file: SOURCE /path/to/schema.sql;
-- ============================================================

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;
SET SQL_MODE = 'STRICT_ALL_TABLES';

-- ──────────────────────────────────────
-- users
-- Admin users only. No customer accounts.
-- ──────────────────────────────────────
CREATE TABLE IF NOT EXISTS `users` (
  `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name`          VARCHAR(100) NOT NULL,
  `email`         VARCHAR(150) NOT NULL,
  `password_hash` VARCHAR(255) NOT NULL,
  `role`          ENUM('admin') NOT NULL DEFAULT 'admin',
  `is_active`     TINYINT(1) NOT NULL DEFAULT 1,
  `created_at`    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `uq_users_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ──────────────────────────────────────
-- rooms
-- ──────────────────────────────────────
CREATE TABLE IF NOT EXISTS `rooms` (
  `id`               INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name`             VARCHAR(100) NOT NULL,
  `slug`             VARCHAR(120) NOT NULL,
  `description`      TEXT,
  `short_description`VARCHAR(300),
  `price_per_night`  DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  `capacity`         TINYINT UNSIGNED NOT NULL DEFAULT 2,
  `beds`             TINYINT UNSIGNED NOT NULL DEFAULT 1,
  `size_sqft`        SMALLINT UNSIGNED,
  `amenities`        JSON,
  `is_active`        TINYINT(1) NOT NULL DEFAULT 1,
  `sort_order`       SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  `created_at`       TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`       TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `uq_rooms_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ──────────────────────────────────────
-- room_images
-- ──────────────────────────────────────
CREATE TABLE IF NOT EXISTS `room_images` (
  `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `room_id`    INT UNSIGNED NOT NULL,
  `filename`   VARCHAR(255) NOT NULL,
  `alt_text`   VARCHAR(200),
  `is_primary` TINYINT(1) NOT NULL DEFAULT 0,
  `sort_order` SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`room_id`) REFERENCES `rooms`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ──────────────────────────────────────
-- room_availability
-- Stores blocked/booked date ranges per room.
-- ──────────────────────────────────────
CREATE TABLE IF NOT EXISTS `room_availability` (
  `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `room_id`    INT UNSIGNED NOT NULL,
  `start_date` DATE NOT NULL,
  `end_date`   DATE NOT NULL,
  `reason`     ENUM('booked','maintenance','blocked') NOT NULL DEFAULT 'booked',
  `note`       VARCHAR(255),
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `idx_room_dates` (`room_id`, `start_date`, `end_date`),
  FOREIGN KEY (`room_id`) REFERENCES `rooms`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ──────────────────────────────────────
-- packages
-- Resort stay packages (room + meals + activities combos)
-- ──────────────────────────────────────
CREATE TABLE IF NOT EXISTS `packages` (
  `id`               INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name`             VARCHAR(100) NOT NULL,
  `slug`             VARCHAR(120) NOT NULL,
  `description`      TEXT,
  `short_description`VARCHAR(300),
  `price`            DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  `duration_nights`  TINYINT UNSIGNED,
  `includes`         JSON,
  `cover_image`      VARCHAR(255),
  `is_active`        TINYINT(1) NOT NULL DEFAULT 1,
  `sort_order`       SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  `created_at`       TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`       TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `uq_packages_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ──────────────────────────────────────
-- dining_categories
-- ──────────────────────────────────────
CREATE TABLE IF NOT EXISTS `dining_categories` (
  `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name`       VARCHAR(100) NOT NULL,
  `description`VARCHAR(300),
  `icon`       VARCHAR(100),
  `is_active`  TINYINT(1) NOT NULL DEFAULT 1,
  `sort_order` SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ──────────────────────────────────────
-- dining_items
-- ──────────────────────────────────────
CREATE TABLE IF NOT EXISTS `dining_items` (
  `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `category_id` INT UNSIGNED NOT NULL,
  `name`        VARCHAR(150) NOT NULL,
  `description` VARCHAR(400),
  `price`       DECIMAL(8,2),
  `image`       VARCHAR(255),
  `is_active`   TINYINT(1) NOT NULL DEFAULT 1,
  `sort_order`  SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  `created_at`  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`category_id`) REFERENCES `dining_categories`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ──────────────────────────────────────
-- experiences
-- Pool, cinema, activities, etc.
-- ──────────────────────────────────────
CREATE TABLE IF NOT EXISTS `experiences` (
  `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name`        VARCHAR(100) NOT NULL,
  `slug`        VARCHAR(120) NOT NULL,
  `description` TEXT,
  `icon`        VARCHAR(100),
  `cover_image` VARCHAR(255),
  `is_active`   TINYINT(1) NOT NULL DEFAULT 1,
  `sort_order`  SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  `created_at`  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `uq_experiences_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ──────────────────────────────────────
-- gallery_categories
-- e.g. "Memories", "Special Memories", "Resort"
-- ──────────────────────────────────────
CREATE TABLE IF NOT EXISTS `gallery_categories` (
  `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name`       VARCHAR(100) NOT NULL,
  `slug`       VARCHAR(120) NOT NULL,
  `is_active`  TINYINT(1) NOT NULL DEFAULT 1,
  `sort_order` SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `uq_gallery_categories_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ──────────────────────────────────────
-- gallery_images
-- ──────────────────────────────────────
CREATE TABLE IF NOT EXISTS `gallery_images` (
  `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `category_id` INT UNSIGNED NOT NULL,
  `filename`    VARCHAR(255) NOT NULL,
  `alt_text`    VARCHAR(200),
  `caption`     VARCHAR(300),
  `is_active`   TINYINT(1) NOT NULL DEFAULT 1,
  `sort_order`  SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  `created_at`  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`category_id`) REFERENCES `gallery_categories`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ──────────────────────────────────────
-- booking_enquiries
-- No payment — enquiry/communication only.
-- ──────────────────────────────────────
CREATE TABLE IF NOT EXISTS `booking_enquiries` (
  `id`              INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `full_name`       VARCHAR(100) NOT NULL,
  `email`           VARCHAR(150) NOT NULL,
  `phone`           VARCHAR(20)  NOT NULL,
  `check_in_date`   DATE NOT NULL,
  `check_out_date`  DATE NOT NULL,
  `guests`          TINYINT UNSIGNED NOT NULL DEFAULT 1,
  `room_id`         INT UNSIGNED,
  `package_id`      INT UNSIGNED,
  `special_request` TEXT,
  `contact_method`  ENUM('email','whatsapp','phone') NOT NULL DEFAULT 'email',
  `status`          ENUM('PENDING','CONTACTED','CONFIRMED','CANCELLED','COMPLETED') NOT NULL DEFAULT 'PENDING',
  `admin_notes`     TEXT,
  `created_at`      TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`      TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `idx_booking_status`   (`status`),
  KEY `idx_booking_dates`    (`check_in_date`, `check_out_date`),
  FOREIGN KEY (`room_id`)    REFERENCES `rooms`(`id`)    ON DELETE SET NULL,
  FOREIGN KEY (`package_id`) REFERENCES `packages`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ──────────────────────────────────────
-- contact_enquiries
-- ──────────────────────────────────────
CREATE TABLE IF NOT EXISTS `contact_enquiries` (
  `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name`       VARCHAR(100) NOT NULL,
  `email`      VARCHAR(150) NOT NULL,
  `phone`      VARCHAR(20),
  `subject`    VARCHAR(200),
  `message`    TEXT NOT NULL,
  `is_read`    TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ──────────────────────────────────────
-- site_settings
-- Admin-configurable key/value settings
-- ──────────────────────────────────────
CREATE TABLE IF NOT EXISTS `site_settings` (
  `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `setting_key` VARCHAR(100) NOT NULL,
  `value`       TEXT,
  `description` VARCHAR(300),
  `updated_at`  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `uq_setting_key` (`setting_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ──────────────────────────────────────
-- Seed: Default site settings
-- ──────────────────────────────────────
INSERT IGNORE INTO `site_settings` (`setting_key`, `value`, `description`) VALUES
  ('site_name',        'GT HOMES Holiday Resort',    'Website name'),
  ('site_tagline',     'Your Perfect Escape',         'Hero tagline'),
  ('phone',            '0777 872 280',                'Primary hotline contact number'),
  ('office_phone',     '0817 872 280',                'Office line contact number'),
  ('whatsapp_number',  '94777872280',                 'WhatsApp number (international format)'),
  ('email',            'gthomes99ck@gmail.com',       'Primary contact email'),
  ('address',          'No 99/C/3, Pragathi Road, Peradeniya, Sri Lanka', 'Physical address'),
  ('maps_url',         'https://www.google.com/maps/place/7%C2%B016%2727.3%22N+80%C2%B035%2717.3%22E/@7.2742367,80.5855518,826m/data=!3m2!1e3!4b1!4m4!3m3!8m2!3d7.2742367!4d80.5881267?hl=en&entry=ttu&g_ep=EgoyMDI2MDgxNi4wIKXMDSoASAFQAw%3D%3D', 'Google Maps link'),
  ('established_year', '2016',                        'Resort established year'),
  ('facebook_url',     '',                            'Facebook page URL'),
  ('instagram_url',    '',                            'Instagram page URL');

SET FOREIGN_KEY_CHECKS = 1;
