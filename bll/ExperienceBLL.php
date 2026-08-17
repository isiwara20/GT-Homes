<?php

declare(strict_types=1);

/** GT HOMES — Experience BLL (skeleton) */
class ExperienceBLL extends BaseBLL
{
    private ExperienceDAL $dal;

    public function __construct()
    {
        $this->dal = new ExperienceDAL();
    }

    /**
     * Get all active resort experiences.
     * Uses database if available, otherwise returns confirmed static resort experiences.
     *
     * @return array<int, array<string, mixed>>
     */
    public function getActiveExperiences(): array
    {
        try {
            $db = $this->dal->findAll();
            if (!empty($db)) {
                return $db;
            }
        } catch (\Throwable $e) {
            // DB fallback
        }

        return $this->getStaticExperiences();
    }

    /**
     * Get confirmed static resort experiences data.
     *
     * @return array<int, array<string, mixed>>
     */
    public function getStaticExperiences(): array
    {
        return [
            [
                'id' => 1,
                'slug' => 'swimming-pool',
                'name' => 'Swimming Pool',
                'eyebrow' => 'REFRESH & UNWIND',
                'headline' => 'Your Favourite Place to Slow Down',
                'description' => 'Take a break from the everyday and enjoy relaxing moments by the water. Whether you are cooling down in the afternoon or spending time together with family and friends, the pool adds something special to your GT HOMES stay.',
                'image' => 'images/experiences/pool.jpg',
                'tags' => ['Relax', 'Refresh', 'Spend Time Together'],
                'cta_text' => 'Ask About Pool Access',
            ],
            [
                'id' => 2,
                'slug' => 'mini-cinema',
                'name' => 'Private Mini Cinema',
                'eyebrow' => 'PRIVATE ENTERTAINMENT',
                'headline' => 'Your Own Mini Cinema Experience',
                'description' => 'Turn your holiday evening into a private movie night. Gather together, get comfortable and enjoy entertainment in a space designed for shared moments.',
                'image' => 'images/experiences/cinema.jpg',
                'tags' => ['Private Setting', 'Comfortable Viewing', 'Perfect for Groups', 'Relaxed Evenings'],
                'cta_text' => 'Ask About Mini Cinema',
            ],
            [
                'id' => 3,
                'slug' => 'special-dining',
                'name' => 'Special Dining',
                'eyebrow' => 'DINE & ENJOY',
                'headline' => 'Good Food, Better Moments',
                'description' => 'Complete your GT HOMES getaway with comforting meals, Sri Lankan flavours and dining experiences made for sharing.',
                'image' => 'images/experiences/dining.jpg',
                'tags' => ['Fresh Breakfast', 'Sri Lankan Flavours', 'Special Dinners'],
                'cta_text' => 'Explore Dining',
            ],
            [
                'id' => 4,
                'slug' => 'relaxation',
                'name' => 'Relaxation & Resort Spaces',
                'eyebrow' => 'SLOW DOWN',
                'headline' => 'Spaces Made for Taking It Easy',
                'description' => 'Sometimes the best part of a getaway is doing very little. Take time to sit back, enjoy the surroundings and share quiet moments away from the usual routine.',
                'image' => 'images/home/welcome.jpg',
                'tags' => ['Tranquil Grounds', 'Quiet Verandas', 'Peaceful Ambiance'],
                'cta_text' => 'Plan Your Stay',
            ],
            [
                'id' => 5,
                'slug' => 'special-moments',
                'name' => 'Special Moments & Celebrations',
                'eyebrow' => 'SPECIAL MOMENTS',
                'headline' => 'Some Stays Deserve a Little More Celebration',
                'description' => 'Birthdays, anniversaries, family gatherings and simple moments together can become memories you carry long after your stay.',
                'image' => 'images/home/cta_bg.jpg',
                'tags' => ['Birthdays', 'Anniversaries', 'Family Gatherings', 'Romantic Stays'],
                'cta_text' => 'Plan a Special Stay',
            ],
        ];
    }
}
