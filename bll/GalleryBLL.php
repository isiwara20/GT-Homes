<?php

declare(strict_types=1);

/** GT HOMES — Gallery BLL (skeleton) */
class GalleryBLL extends BaseBLL
{
    private GalleryDAL $dal;

    public function __construct()
    {
        $this->dal = new GalleryDAL();
    }

    /**
     * Get gallery categories and images.
     * Uses database if available, otherwise returns confirmed static gallery items.
     *
     * @return array{categories: array<int, array<string, mixed>>, images: array<int, array<string, mixed>>}
     */
    public function getGalleryData(): array
    {
        try {
            $dbCategories = $this->dal->findCategories();
            $dbImages     = $this->dal->findGalleryImages();
            if (!empty($dbImages)) {
                return [
                    'categories' => $dbCategories,
                    'images'     => $dbImages,
                ];
            }
        } catch (\Throwable $e) {
            // DB fallback
        }

        return $this->getStaticGalleryData();
    }

    /**
     * Get static gallery data matching GT HOMES resort assets.
     *
     * @return array{categories: array<int, array<string, mixed>>, images: array<int, array<string, mixed>>}
     */
    public function getStaticGalleryData(): array
    {
        $categories = [
            ['slug' => 'all', 'name' => 'All Moments'],
            ['slug' => 'rooms', 'name' => 'Rooms & Accommodation'],
            ['slug' => 'dining', 'name' => 'Dining & Flavours'],
            ['slug' => 'pool', 'name' => 'Swimming Pool'],
            ['slug' => 'cinema', 'name' => 'Mini Cinema'],
            ['slug' => 'celebrations', 'name' => 'Special Moments'],
        ];

        $images = [
            [
                'id' => 1,
                'category_slug' => 'rooms',
                'category_name' => 'Rooms & Accommodation',
                'title' => 'ORCHID Suite — Couple Sanctuary',
                'description' => 'Peaceful garden view room with King bed and private veranda.',
                'image' => 'images/rooms/orchid/main.jpg',
                'is_featured' => true,
            ],
            [
                'id' => 2,
                'category_slug' => 'rooms',
                'category_name' => 'Rooms & Accommodation',
                'title' => 'DAHILIYA Suite — Family Comfort',
                'description' => 'Spacious family room with Queen and Twin beds.',
                'image' => 'images/rooms/dahiliya/main.jpg',
                'is_featured' => false,
            ],
            [
                'id' => 3,
                'category_slug' => 'pool',
                'category_name' => 'Swimming Pool',
                'title' => 'Resort Swimming Pool & Lounge',
                'description' => 'Crystal clear pool waters surrounded by tropical resort greenery.',
                'image' => 'images/experiences/pool.jpg',
                'is_featured' => true,
            ],
            [
                'id' => 4,
                'category_slug' => 'cinema',
                'category_name' => 'Mini Cinema',
                'title' => 'Private Screening Room',
                'description' => 'Comfortable private mini cinema setting for family movie nights.',
                'image' => 'images/experiences/cinema.jpg',
                'is_featured' => true,
            ],
            [
                'id' => 5,
                'category_slug' => 'dining',
                'category_name' => 'Dining & Flavours',
                'title' => 'Sri Lankan Culinary Feast',
                'description' => 'Freshly prepared local rice, curries, and special resort dining.',
                'image' => 'images/menu/menu_1.png',
                'is_featured' => true,
            ],
            [
                'id' => 6,
                'category_slug' => 'rooms',
                'category_name' => 'Rooms & Accommodation',
                'title' => 'LOTUS Suite — Poolside Access',
                'description' => 'Direct pool view room with private terrace and tea setup.',
                'image' => 'images/rooms/lotus/main.jpg',
                'is_featured' => false,
            ],
            [
                'id' => 7,
                'category_slug' => 'rooms',
                'category_name' => 'Rooms & Accommodation',
                'title' => 'DAFFODIL Room — Cozy Haven',
                'description' => 'Warm, inviting bedroom space designed for peaceful rest.',
                'image' => 'images/rooms/daffodil/main.jpg',
                'is_featured' => false,
            ],
            [
                'id' => 8,
                'category_slug' => 'rooms',
                'category_name' => 'Rooms & Accommodation',
                'title' => 'ROSE Suite — Executive Flagship',
                'description' => 'Panoramic resort view luxury suite with premium amenities.',
                'image' => 'images/rooms/rose/main.jpg',
                'is_featured' => true,
            ],
            [
                'id' => 9,
                'category_slug' => 'celebrations',
                'category_name' => 'Special Moments',
                'title' => 'Resort Celebration Moment 1',
                'description' => 'Capturing romantic and festive staycation memories at GT HOMES.',
                'image' => 'images/rooms/memories/photo_1.jpg',
                'is_featured' => true,
            ],
            [
                'id' => 10,
                'category_slug' => 'celebrations',
                'category_name' => 'Special Moments',
                'title' => 'Resort Celebration Moment 2',
                'description' => 'Warm ambient setup for private evening celebrations.',
                'image' => 'images/rooms/memories/photo_2.jpg',
                'is_featured' => false,
            ],
            [
                'id' => 11,
                'category_slug' => 'celebrations',
                'category_name' => 'Special Moments',
                'title' => 'Resort Celebration Moment 3',
                'description' => 'Special room decor for anniversaries and birthdays.',
                'image' => 'images/rooms/memories/photo_3.jpg',
                'is_featured' => false,
            ],
            [
                'id' => 12,
                'category_slug' => 'celebrations',
                'category_name' => 'Special Moments',
                'title' => 'Resort Celebration Moment 4',
                'description' => 'Unforgettable resort staycation highlights.',
                'image' => 'images/rooms/memories/photo_4.jpg',
                'is_featured' => false,
            ],
            [
                'id' => 13,
                'category_slug' => 'celebrations',
                'category_name' => 'Special Moments',
                'title' => 'Resort Celebration Moment 5',
                'description' => 'Poolside evening relaxation and party lights.',
                'image' => 'images/rooms/memories/photo_5.jpg',
                'is_featured' => false,
            ],
            [
                'id' => 14,
                'category_slug' => 'celebrations',
                'category_name' => 'Special Moments',
                'title' => 'Resort Celebration Moment 6',
                'description' => 'Group getaway bonding and tropical resort atmosphere.',
                'image' => 'images/rooms/memories/photo_6.jpg',
                'is_featured' => false,
            ],
            [
                'id' => 15,
                'category_slug' => 'celebrations',
                'category_name' => 'Special Moments',
                'title' => 'Resort Celebration Moment 7',
                'description' => 'Peaceful morning sunrise over GT HOMES courtyard.',
                'image' => 'images/rooms/memories/photo_7.jpg',
                'is_featured' => false,
            ],
            [
                'id' => 16,
                'category_slug' => 'celebrations',
                'category_name' => 'Special Moments',
                'title' => 'Resort Celebration Moment 8',
                'description' => 'Special dining and private guest experiences.',
                'image' => 'images/rooms/memories/photo_8.jpg',
                'is_featured' => false,
            ],
        ];

        return [
            'categories' => $categories,
            'images'     => $images,
        ];
    }
}
