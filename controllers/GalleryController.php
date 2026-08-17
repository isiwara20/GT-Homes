<?php

declare(strict_types=1);

/** GT HOMES — Gallery Controller */
class GalleryController extends BaseController
{
    private GalleryBLL $bll;

    public function __construct()
    {
        $this->bll = new GalleryBLL();
    }

    public function index(): array
    {
        $data = $this->bll->getGalleryData();

        return [
            'pageTitle'       => 'Memories Gallery | ' . APP_NAME,
            'metaDescription' => 'Explore the photo gallery of GT HOMES Holiday Resort including rooms, swimming pool, mini cinema, dining, and special moments.',
            'categories'      => $data['categories'],
            'images'          => $data['images'],
        ];
    }
}
