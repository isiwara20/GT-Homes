<?php

declare(strict_types=1);

/** GT HOMES — Experience Controller (Pool, Cinema, Activities) */
class ExperienceController extends BaseController
{
    public function index(): array
    {
        return [
            'pageTitle'       => 'Experiences — ' . APP_NAME,
            'metaDescription' => 'Discover experiences at GT HOMES — swimming pool, mini cinema, activities and more.',
            'experiences'     => [],
        ];
    }
}
