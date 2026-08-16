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

    /** @return array<int, array<string, mixed>> */
    public function getGalleryImages(): array
    {
        // Future: return $this->dal->findGalleryImages();
        return [];
    }
}
