<?php

declare(strict_types=1);

/** GT HOMES — Room Business Logic Layer */
class RoomBLL extends BaseBLL
{
    private RoomDAL $dal;

    public function __construct()
    {
        $this->dal = new RoomDAL();
    }

    /**
     * Get all active rooms for public display.
     * Future: apply business rules (filtering, sorting, availability checks).
     *
     * @return array<int, array<string, mixed>>
     */
    public function getActiveRooms(): array
    {
        // Future: return $this->dal->findActive();
        return [];
    }

    /**
     * Get a single room by slug.
     * Returns null if not found.
     *
     * @return array<string, mixed>|null
     */
    public function getRoomBySlug(string $slug): ?array
    {
        // Future: return $this->dal->findBySlug($slug);
        return null;
    }
}
