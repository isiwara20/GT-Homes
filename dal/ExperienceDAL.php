<?php

declare(strict_types=1);

/** GT HOMES — Experience DAL (skeleton) */
class ExperienceDAL extends BaseDAL
{
    /** @return array<int, array<string, mixed>> */
    public function findAll(): array
    {
        return $this->fetchAll(
            'SELECT * FROM experiences WHERE is_active = 1 ORDER BY sort_order ASC'
        );
    }
}
