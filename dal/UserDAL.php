<?php

declare(strict_types=1);

/** GT HOMES — User DAL */
class UserDAL extends BaseDAL
{
    /**
     * Find an admin user by email address.
     *
     * @return array<string, mixed>|null
     */
    public function findByEmail(string $email): ?array
    {
        return $this->fetchOne(
            'SELECT id, email, name, password_hash, is_active, role
               FROM users
              WHERE email = :email
              LIMIT 1',
            [':email' => $email]
        );
    }

    /**
     * Find a user by ID.
     *
     * @return array<string, mixed>|null
     */
    public function findById(int $id): ?array
    {
        return $this->fetchOne(
            'SELECT id, email, name, is_active, role
               FROM users
              WHERE id = :id
              LIMIT 1',
            [':id' => $id]
        );
    }

    /**
     * Update the stored password hash for a user.
     * Called when password_needs_rehash() returns true.
     */
    public function updatePasswordHash(int $id, string $newHash): void
    {
        $this->execute(
            'UPDATE users
                SET password_hash = :hash,
                    updated_at    = CURRENT_TIMESTAMP
              WHERE id = :id',
            [':hash' => $newHash, ':id' => $id]
        );
    }
}
