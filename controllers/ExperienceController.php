<?php

declare(strict_types=1);

/** GT HOMES — Experience Controller (Pool, Cinema, Activities) */
class ExperienceController extends BaseController
{
    private ExperienceBLL $bll;

    public function __construct()
    {
        $this->bll = new ExperienceBLL();
    }

    public function index(): array
    {
        $experiences = $this->bll->getActiveExperiences();

        return [
            'pageTitle'       => 'Experiences & Facilities | ' . APP_NAME,
            'metaDescription' => 'Discover experiences at GT HOMES Holiday Resort including the swimming pool, private mini cinema, special dining, relaxing spaces, and memorable stays.',
            'experiences'     => $experiences,
        ];
    }
}
