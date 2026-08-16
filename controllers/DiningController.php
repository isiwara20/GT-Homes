<?php

declare(strict_types=1);

/** GT HOMES — Dining Controller */
class DiningController extends BaseController
{
    public function index(): array
    {
        return [
            'pageTitle'       => 'Dining & Menu — ' . APP_NAME,
            'metaDescription' => 'Explore dining options and menu at GT HOMES Holiday Resort.',
            'categories'      => [],
        ];
    }
}
