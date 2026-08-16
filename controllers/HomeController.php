<?php

declare(strict_types=1);

/**
 * GT HOMES — Home Controller
 * Handles the homepage request.
 */
class HomeController extends BaseController
{
    /**
     * Display the homepage.
     * @return array<string, mixed>  Data passed to the view.
     */
    public function index(): array
    {
        // Future: load featured rooms, packages, and hero content from BLL
        return [
            'pageTitle'       => APP_NAME . ' — ' . APP_TAGLINE,
            'metaDescription' => 'GT HOMES Holiday Resort — A luxury escape nestled in Sri Lanka. '
                               . 'Enjoy premium rooms, fine dining, and unforgettable experiences.',
        ];
    }
}
