<?php

declare(strict_types=1);

/** GT HOMES — Dining BLL (skeleton) */
class DiningBLL extends BaseBLL
{
    private DiningDAL $dal;

    public function __construct()
    {
        $this->dal = new DiningDAL();
    }

    /** @return array<int, array<string, mixed>> */
    public function getCategories(): array
    {
        // Future: return $this->dal->findCategories();
        return [];
    }
}
