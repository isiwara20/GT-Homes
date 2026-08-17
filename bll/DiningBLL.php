<?php

declare(strict_types=1);

/** GT HOMES — Dining BLL (skeleton) */
class DiningBLL extends BaseBLL
{
    private DiningDAL $dal;

    public function __construct()
    {
        $this->dal = new DiningDAL();
    }

    /**
     * Get all dining categories with items.
     * Uses database if populated, otherwise falls back to confirmed static categories.
     *
     * @return array<int, array<string, mixed>>
     */
    public function getCategoriesWithItems(): array
    {
        try {
            $dbCategories = $this->dal->findCategories();
            if (!empty($dbCategories)) {
                foreach ($dbCategories as &$cat) {
                    $cat['items'] = $this->dal->findItemsByCategory((int)$cat['id']);
                }
                return $dbCategories;
            }
        } catch (\Throwable $e) {
            // DB fallback
        }

        return $this->getStaticDiningData();
    }

    /**
     * Get confirmed static resort dining menu data.
     *
     * @return array<int, array<string, mixed>>
     */
    public function getStaticDiningData(): array
    {
        return [
            [
                'id' => 1,
                'slug' => 'breakfast',
                'name' => 'Breakfast',
                'tagline' => 'A relaxed start to your GT HOMES morning',
                'description' => 'Start your day with freshly prepared Sri Lankan breakfast favorites, warm tropical juices, or classic Western options cooked to order.',
                'image' => 'images/experiences/dining.jpg',
                'items' => [
                    [
                        'name' => 'Traditional Sri Lankan Breakfast Set',
                        'description' => 'Plain & egg hoppers, string hoppers, fresh coconut pol sambol, and aromatic dhal curry.',
                        'price' => null,
                        'dietary' => ['Authentic Local', 'Vegetarian Option'],
                        'is_popular' => true,
                    ],
                    [
                        'name' => 'Western Resort Breakfast',
                        'description' => 'Eggs cooked to your liking (scrambled, fried, poached), toasted bread, butter, jam, and tropical fruit slice.',
                        'price' => null,
                        'dietary' => ['Freshly Made'],
                        'is_popular' => false,
                    ],
                    [
                        'name' => 'Tropical Morning Fruit Platter',
                        'description' => 'Selection of freshly sliced seasonal Sri Lankan fruits including papaya, pineapple, banana, and watermelon.',
                        'price' => null,
                        'dietary' => ['Vegan', 'Gluten Free'],
                        'is_popular' => false,
                    ],
                ]
            ],
            [
                'id' => 2,
                'slug' => 'lunch',
                'name' => 'Lunch',
                'tagline' => 'Comforting meals for relaxed afternoons',
                'description' => 'Enjoy satisfying resort lunches crafted with fresh ingredients, local spices, and hearty proportions.',
                'image' => 'images/experiences/dining.jpg',
                'items' => [
                    [
                        'name' => 'GT HOMES Signature Rice & Curry Platter',
                        'description' => 'Steamed fragrant rice served with your choice of chicken, fresh fish, or vegetables, accompanied by 4 seasonal vegetable curries and papadam.',
                        'price' => null,
                        'dietary' => ['Resort Favorite', 'Authentic Local'],
                        'is_popular' => true,
                    ],
                    [
                        'name' => 'Grilled Catch of the Day',
                        'description' => 'Freshly caught coastal fish grilled with lemon garlic butter sauce, served alongside garden salad and steamed potato.',
                        'price' => null,
                        'dietary' => ['Seafood', 'Gluten Free'],
                        'is_popular' => false,
                    ],
                    [
                        'name' => 'Resort Special Wok-Tossed Fried Rice',
                        'description' => 'Wok-fried aromatic rice tossed with fresh vegetables, egg, chicken, or mixed seafood served with chili paste.',
                        'price' => null,
                        'dietary' => ['Freshly Prepared'],
                        'is_popular' => false,
                    ],
                ]
            ],
            [
                'id' => 3,
                'slug' => 'dinner',
                'name' => 'Dinner',
                'tagline' => 'End the day with warm flavours and good company',
                'description' => 'Unwind in the evening with special dinner options prepared freshly for your family or loved ones.',
                'image' => 'images/experiences/dining.jpg',
                'items' => [
                    [
                        'name' => 'Sri Lankan Kottu Roti Special',
                        'description' => 'Shredded flatbread chopped on hot griddle with vegetables, egg, chicken, or cheese served with spicy gravy.',
                        'price' => null,
                        'dietary' => ['Local Street Style', 'Chef Special'],
                        'is_popular' => true,
                    ],
                    [
                        'name' => 'Devilled Seafood / Chicken',
                        'description' => 'Spicy Sri Lankan devilled dish tossed with capsicum, onions, tomatoes, and sweet chili glaze.',
                        'price' => null,
                        'dietary' => ['Spicy Favorite'],
                        'is_popular' => false,
                    ],
                    [
                        'name' => 'Resort BBQ & Grill Selection (On Request)',
                        'description' => 'Marinated meats or seafood grilled freshly over glowing coals for private evening dining setups.',
                        'price' => null,
                        'dietary' => ['Special Order'],
                        'is_popular' => true,
                    ],
                ]
            ],
            [
                'id' => 4,
                'slug' => 'sri-lankan',
                'name' => 'Sri Lankan Specials',
                'tagline' => 'Authentic local dishes rich in island heritage',
                'description' => 'Immerse your palate in traditional Sri Lankan cuisine crafted with coconut milk, aromatic spices, and time-honored recipes.',
                'image' => 'images/experiences/dining.jpg',
                'items' => [
                    [
                        'name' => 'Claypot Fish Curry with Pol Sambol',
                        'description' => 'Slow-simmered fish curry in coconut milk gravy served with fresh hand-scraped coconut sambol and warm rice.',
                        'price' => null,
                        'dietary' => ['Traditional Claypot', 'Spicy'],
                        'is_popular' => true,
                    ],
                    [
                        'name' => 'Coconut Milk Hopper Selection',
                        'description' => 'Crispy-edged bowl hoppers with soft coconut centers, served with lunu miris (spicy onion sambol).',
                        'price' => null,
                        'dietary' => ['Traditional'],
                        'is_popular' => true,
                    ],
                    [
                        'name' => 'Jackfruit (Polos) & Dhal Curry Set',
                        'description' => 'Tender green jackfruit slow-cooked with roasted spices, paired with creamy red lentil dhal.',
                        'price' => null,
                        'dietary' => ['Vegan', 'Gluten Free'],
                        'is_popular' => false,
                    ],
                ]
            ],
            [
                'id' => 5,
                'slug' => 'snacks',
                'name' => 'Snacks & Light Bites',
                'tagline' => 'Easy favourites for relaxed moments between meals',
                'description' => 'Perfect for poolside snacking, afternoon tea, or quiet bites on your private room veranda.',
                'image' => 'images/experiences/dining.jpg',
                'items' => [
                    [
                        'name' => 'Crispy Vegetable Samosas & Rolls',
                        'description' => 'Spiced potato and vegetable pastries fried golden, served with sweet chili dip.',
                        'price' => null,
                        'dietary' => ['Short Eats', 'Vegetarian'],
                        'is_popular' => false,
                    ],
                    [
                        'name' => 'Golden French Fries & Garlic Dip',
                        'description' => 'Crispy thick-cut potato fries lightly salted, served with homemade garlic mayo.',
                        'price' => null,
                        'dietary' => ['Kid Friendly'],
                        'is_popular' => false,
                    ],
                    [
                        'name' => 'GT HOMES Club Sandwich & Chips',
                        'description' => 'Triple-decker toasted sandwich filled with grilled chicken, fried egg, lettuce, tomato, and cheese.',
                        'price' => null,
                        'dietary' => ['Resort Classic'],
                        'is_popular' => true,
                    ],
                ]
            ],
            [
                'id' => 6,
                'slug' => 'beverages',
                'name' => 'Beverages & Juices',
                'tagline' => 'Cool down and refresh during your stay',
                'description' => 'Refreshing tropical fruit juices, fresh king coconut, premium Ceylon teas, and cold drinks.',
                'image' => 'images/experiences/dining.jpg',
                'items' => [
                    [
                        'name' => 'Fresh Sri Lankan King Coconut (Thambili)',
                        'description' => 'Chilled king coconut opened fresh to order, packed with natural electrolytes.',
                        'price' => null,
                        'dietary' => ['100% Natural', 'Refreshing'],
                        'is_popular' => true,
                    ],
                    [
                        'name' => 'Fresh Tropical Fruit Juices',
                        'description' => 'Choice of freshly blended Lime, Mango, Papaya, Pineapple, or Passionfruit juice.',
                        'price' => null,
                        'dietary' => ['Freshly Squeezed'],
                        'is_popular' => true,
                    ],
                    [
                        'name' => 'Premium Ceylon Black / Green Tea',
                        'description' => 'Freshly brewed high-country Ceylon tea served with milk, lemon, or mint.',
                        'price' => null,
                        'dietary' => ['Ceylon Tea'],
                        'is_popular' => false,
                    ],
                ]
            ],
        ];
    }
}
