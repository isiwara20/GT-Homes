<?php

declare(strict_types=1);

/** GT HOMES — Gallery DAL (skeleton) */
class GalleryDAL extends BaseDAL
{
    /** @return array<int, array<string, mixed>> */
    public function findGalleryImages(): array
    {
        return $this->fetchAll(
            'SELECT gi.*, gc.name AS category_name
               FROM gallery_images gi
               JOIN gallery_categories gc ON gi.category_id = gc.id
              WHERE gi.is_active = 1
              ORDER BY gi.sort_order ASC, gi.id DESC'
        );
    }

    /** @return array<int, array<string, mixed>> */
    public function findCategories(): array
    {
        return $this->fetchAll(
            'SELECT * FROM gallery_categories WHERE is_active = 1 ORDER BY sort_order ASC'
        );
    }
}
