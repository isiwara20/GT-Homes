<?php

declare(strict_types=1);

/** GT HOMES — Dining DAL (skeleton) */
class DiningDAL extends BaseDAL
{
    /** @return array<int, array<string, mixed>> */
    public function findCategories(): array
    {
        return $this->fetchAll(
            'SELECT * FROM dining_categories WHERE is_active = 1 ORDER BY sort_order ASC'
        );
    }

    /** @return array<int, array<string, mixed>> */
    public function findItemsByCategory(int $categoryId): array
    {
        return $this->fetchAll(
            'SELECT * FROM dining_items WHERE category_id = :cat_id AND is_active = 1 ORDER BY name ASC',
            [':cat_id' => $categoryId]
        );
    }
}
