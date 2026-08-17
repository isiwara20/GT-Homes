<?php

declare(strict_types=1);

/** GT HOMES — Dining Controller */
class DiningController extends BaseController
{
    private DiningBLL $bll;

    public function __construct()
    {
        $this->bll = new DiningBLL();
    }

    public function index(): array
    {
        $categories = $this->bll->getCategoriesWithItems();

        return [
            'pageTitle'       => 'Dining & Special Menu | ' . APP_NAME,
            'metaDescription' => 'Explore dining at GT HOMES Holiday Resort, including fresh breakfast, authentic Sri Lankan flavours, refreshing beverages, and special dining options for your stay.',
            'categories'      => $categories,
        ];
    }
}
