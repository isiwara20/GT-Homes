<?php

declare(strict_types=1);

/** GT HOMES — About BLL */
class AboutBLL extends BaseBLL
{
    private AboutDAL $dal;

    public function __construct()
    {
        $this->dal = new AboutDAL();
    }

    /**
     * Get resort story, values, and stats.
     *
     * @return array<string, mixed>
     */
    public function getAboutData(): array
    {
        return [
            'company_name' => 'GT HOMES Holiday Resort (Pvt) Ltd',
            'tagline'      => 'Where Luxury Meets Authentic Sri Lankan Warmth',
            'story'        => 'GT HOMES Holiday Resort (Pvt) Ltd was founded with a singular vision: to create a tranquil sanctuary where families, couples, and friends can escape the rush of daily life and immerse themselves in comfort, relaxation, and genuine Sri Lankan hospitality.',
            'values'       => [
                [
                    'icon'  => 'fa-solid fa-heart',
                    'title' => 'Warm Hospitality',
                    'desc'  => 'Every guest is welcomed with personalized service and attention to every detail of your stay.'
                ],
                [
                    'icon'  => 'fa-solid fa-shield-halved',
                    'title' => 'Comfort & Privacy',
                    'desc'  => 'Our 5 distinctive rooms and resort spaces are thoughtfully prepared for peaceful rest and complete privacy.'
                ],
                [
                    'icon'  => 'fa-solid fa-leaf',
                    'title' => 'Tranquil Environment',
                    'desc'  => 'Set amidst lush greenery, offering refreshing poolside moments and quiet verandas to slow down.'
                ],
                [
                    'icon'  => 'fa-solid fa-utensils',
                    'title' => 'Authentic Flavours',
                    'desc'  => 'From traditional Sri Lankan claypot curries to fresh hoppers and breakfasts, food is part of every memory.'
                ],
            ],
            'stats'        => [
                ['number' => '5', 'label' => 'Distinctive Rooms'],
                ['number' => '1', 'label' => 'Private Mini Cinema'],
                ['number' => '1', 'label' => 'Resort Swimming Pool'],
                ['number' => '100%', 'label' => 'Dedicated Hospitality'],
            ]
        ];
    }
}
