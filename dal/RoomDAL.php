<?php

declare(strict_types=1);

/** GT HOMES — Room DAL (skeleton) */
class RoomDAL extends BaseDAL
{
    /** @return array<int, array<string, mixed>> */
    public function findActive(): array
    {
        return $this->fetchAll(
            'SELECT id, name, slug, description, price_per_night,
                    capacity, is_active
               FROM rooms
              WHERE is_active = 1
              ORDER BY sort_order ASC, name ASC'
        );
    }

    /** @return array<string, mixed>|null */
    public function findBySlug(string $slug): ?array
    {
        return $this->fetchOne(
            'SELECT *
               FROM rooms
              WHERE slug = :slug
                AND is_active = 1
              LIMIT 1',
            [':slug' => $slug]
        );
    }
}
