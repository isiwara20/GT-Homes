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

    public function updateRoomData(string $slug, array $data): bool
    {
        if (!isset($_SESSION['custom_room_data'])) {
            $_SESSION['custom_room_data'] = [];
        }
        $_SESSION['custom_room_data'][$slug] = array_merge(
            $_SESSION['custom_room_data'][$slug] ?? [],
            $data
        );
        return true;
    }

    /**
     * Get all active rooms for public display.
     * Uses database records if available, otherwise returns confirmed static room definitions.
     *
     * @return array<int, array<string, mixed>>
     */
    public function getActiveRooms(): array
    {
        $rooms = $this->getStaticRooms();
        if (isset($_SESSION['custom_room_data'])) {
            foreach ($rooms as &$r) {
                if (isset($_SESSION['custom_room_data'][$r['slug']])) {
                    $r = array_merge($r, $_SESSION['custom_room_data'][$r['slug']]);
                }
            }
        }
        return $rooms;
    }

    /**
     * Get a single room by slug.
     * Returns null if not found.
     *
     * @return array<string, mixed>|null
     */
    public function getRoomBySlug(string $slug): ?array
    {
        $rooms = $this->getActiveRooms();
        foreach ($rooms as $room) {
            if (($room['slug'] ?? '') === $slug) {
                return $room;
            }
        }
        return null;
    }

    /**
     * Confirmed 5 GT HOMES Rooms Data Definition.
     *
     * @return array<int, array<string, mixed>>
     */
    public function getStaticRooms(): array
    {
        return [
            [
                'id' => 1,
                'number' => 'ROOM 01',
                'name' => 'ORCHID',
                'slug' => 'orchid',
                'tagline' => 'A Peaceful Couple Escape with Garden Views',
                'description' => 'A welcoming room designed for peaceful stays, combining comfortable interiors with the relaxing resort atmosphere of GT HOMES.',
                'capacity' => '2 Guests',
                'bed_type' => 'King Size Bed',
                'view' => 'Garden View',
                'price_per_night' => null, // Rate available on enquiry
                'image' => 'images/rooms/orchid/main.jpg',
                'gallery' => [
                    'images/rooms/orchid/photo_1.jpg',
                    'images/rooms/orchid/photo_2.jpg',
                    'images/rooms/orchid/photo_3.jpg',
                    'images/rooms/orchid/photo_4.jpg',
                    'images/rooms/orchid/photo_5.jpg',
                    'images/rooms/orchid/photo_6.jpg',
                    'images/rooms/orchid/photo_7.jpg',
                ],
                'features' => ['Air Conditioning', 'Ensuite Bathroom', 'Private Veranda', 'High-Speed Wi-Fi'],
            ],
            [
                'id' => 2,
                'number' => 'ROOM 02',
                'name' => 'DAHILIYA',
                'slug' => 'dahiliya',
                'tagline' => 'Spacious Comfort for Family & Friends',
                'description' => 'Designed for families and small groups seeking additional space, Dahiliya offers a warm, serene setting for relaxing holiday getaways.',
                'capacity' => '3–4 Guests',
                'bed_type' => 'Queen & Twin Beds',
                'view' => 'Resort View',
                'price_per_night' => null,
                'image' => 'images/rooms/dahiliya/main.jpg',
                'gallery' => [
                    'images/rooms/dahiliya/photo_1.jpg',
                    'images/rooms/dahiliya/photo_2.jpg',
                    'images/rooms/dahiliya/photo_3.jpg',
                    'images/rooms/dahiliya/photo_4.jpg',
                    'images/rooms/dahiliya/photo_5.jpg',
                    'images/rooms/dahiliya/photo_6.jpg',
                ],
                'features' => ['Air Conditioning', 'Spacious Seating', 'Flat-screen TV', 'Mini Fridge'],
            ],
            [
                'id' => 3,
                'number' => 'ROOM 03',
                'name' => 'LOTUS',
                'slug' => 'lotus',
                'tagline' => 'Poolside Serenity with Instant Water Access',
                'description' => 'Step directly towards refreshing poolside moments. Lotus features elegant decor and quick access to our resort swimming pool.',
                'capacity' => '2 Guests',
                'bed_type' => 'King Size Bed',
                'view' => 'Pool View',
                'price_per_night' => null,
                'image' => 'images/rooms/lotus/main.jpg',
                'gallery' => [
                    'images/rooms/lotus/photo_1.jpg',
                    'images/rooms/lotus/photo_2.jpg',
                    'images/rooms/lotus/photo_3.jpg',
                    'images/rooms/lotus/photo_4.jpg',
                    'images/rooms/lotus/photo_5.jpg',
                    'images/rooms/lotus/photo_6.jpg',
                ],
                'features' => ['Direct Pool Access', 'Air Conditioning', 'Private Terrace', 'Complimentary Tea/Coffee'],
            ],
            [
                'id' => 4,
                'number' => 'ROOM 04',
                'name' => 'DAFFODIL',
                'slug' => 'daffodil',
                'tagline' => 'Cozy Retreat for Quiet Rest & Relaxation',
                'description' => 'Charming and quiet, Daffodil provides an intimate sanctuary equipped with cozy bedding and modern comforts for a restful sleep.',
                'capacity' => '2 Guests',
                'bed_type' => 'Double Bed',
                'view' => 'Courtyard View',
                'price_per_night' => null,
                'image' => 'images/rooms/daffodil/main.jpg',
                'gallery' => [
                    'images/rooms/daffodil/photo_1.jpg',
                    'images/rooms/daffodil/photo_2.jpg',
                    'images/rooms/daffodil/photo_3.jpg',
                    'images/rooms/daffodil/photo_4.jpg',
                    'images/rooms/daffodil/photo_5.jpg',
                    'images/rooms/daffodil/photo_6.jpg',
                    'images/rooms/daffodil/photo_7.jpg',
                    'images/rooms/daffodil/photo_8.jpg',
                    'images/rooms/daffodil/photo_9.jpg',
                ],
                'features' => ['Air Conditioning', 'Work Desk', 'Ensuite Shower', 'Daily Housekeeping'],
            ],
            [
                'id' => 5,
                'number' => 'ROOM 05',
                'name' => 'ROSE',
                'slug' => 'rose',
                'tagline' => 'Executive Suite with Premium Touches',
                'description' => 'Our flagship room featuring refined aesthetics, spacious layout, and luxury touches for guests wanting an extraordinary GT HOMES experience.',
                'capacity' => '2–3 Guests',
                'bed_type' => 'King Deluxe Bed',
                'view' => 'Panoramic Resort View',
                'price_per_night' => null,
                'image' => 'images/rooms/rose/main.jpg',
                'gallery' => [
                    'images/rooms/rose/photo_1.jpg',
                    'images/rooms/rose/photo_2.jpg',
                    'images/rooms/rose/photo_3.jpg',
                    'images/rooms/rose/photo_4.jpg',
                    'images/rooms/rose/photo_5.jpg',
                    'images/rooms/rose/photo_6.jpg',
                    'images/rooms/rose/photo_7.jpg',
                ],
                'features' => ['Premium Linens', 'Air Conditioning', 'Seating Lounge', 'Mini Cinema Access'],
            ],
        ];
    }
}
