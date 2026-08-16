# Database Files

This directory contains SQL files for the GT HOMES database.

## Files

| File | Purpose |
|------|---------|
| `schema.sql` | Creates all tables and initial settings |
| `seed.sql` | Inserts default admin user and starter data |

## Setup

```sql
-- 1. Create the database
CREATE DATABASE gt_homes
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

-- 2. Import schema
SOURCE C:/xampp/htdocs/GT-Homes/database/schema.sql;

-- 3. Import seed (optional)
SOURCE C:/xampp/htdocs/GT-Homes/database/seed.sql;
```

## Admin Password

The seed file contains a placeholder bcrypt hash. **You must replace it** before use:

```bash
php -r "echo password_hash('YourStrongPassword', PASSWORD_DEFAULT);"
```

Copy the output and update `seed.sql` before importing.

## Notes

- All tables use `ENGINE=InnoDB` for foreign key support.
- All tables use `CHARACTER SET utf8mb4` for full Unicode support including emoji.
- Never expose this directory via a public URL.
