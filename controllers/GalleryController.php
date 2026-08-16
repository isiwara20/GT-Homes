<?php

declare(strict_types=1);

/** GT HOMES — Gallery Controller */
class GalleryController extends BaseController
{
    public function index(): array
    {
        return [
            'pageTitle'       => 'Memories Gallery — ' . APP_NAME,
            'metaDescription' => 'Browse the photo gallery and special memories at GT HOMES Holiday Resort.',
            'categories'      => [],
            'images'          => [],
        ];
    }
}
