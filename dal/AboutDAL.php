<?php

declare(strict_types=1);

/** GT HOMES — About DAL */
class AboutDAL extends BaseDAL
{
    /**
     * Get resort settings or metadata if available.
     * @return array<string, mixed>
     */
    public function getResortMetadata(): array
    {
        return [
            'name' => APP_NAME,
            'hotline' => '0777 872 280',
        ];
    }
}
