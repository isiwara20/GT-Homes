<?php

declare(strict_types=1);

/** GT HOMES — Experience BLL (skeleton) */
class ExperienceBLL extends BaseBLL
{
    private ExperienceDAL $dal;

    public function __construct()
    {
        $this->dal = new ExperienceDAL();
    }

    /** @return array<int, array<string, mixed>> */
    public function getAll(): array
    {
        // Future: return $this->dal->findAll();
        return [];
    }
}
