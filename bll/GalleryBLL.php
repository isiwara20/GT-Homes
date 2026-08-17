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
                'image' => 'images/experiences/dining.jpg',
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
                'title' => 'Tranquil Resort Grounds',
                'description' => 'Serene outdoor spaces and lush gardens for relaxation.',
                'image' => 'images/home/welcome.jpg',
                'is_featured' => false,
            ],
            [
                'id' => 10,
                'category_slug' => 'celebrations',
                'category_name' => 'Special Moments',
                'title' => 'Twilight Resort Ambiance',
                'description' => 'Warm resort lighting glowing at sunset over GT HOMES.',
                'image' => 'images/home/hero.jpg',
                'is_featured' => true,
            ],
            [
                'id' => 11,
                'category_slug' => 'celebrations',
                'category_name' => 'Special Moments',
                'title' => 'Evening Celebrations Setup',
                'description' => 'Special evening setups for birthdays and family gatherings.',
                'image' => 'images/home/cta_bg.jpg',
                'is_featured' => false,
            ],
            [
                'id' => 12,
                'category_slug' => 'celebrations',
                'category_name' => 'Special Moments',
                'title' => 'Memorable Resort Moments',
                'description' => 'Capturing lasting holiday memories at GT HOMES.',
                'image' => 'images/gallery/gallery_1.jpg',
                'is_featured' => false,
            ],
        ];

        return [
            'categories' => $categories,
            'images'     => $images,
        ];
    }
}
