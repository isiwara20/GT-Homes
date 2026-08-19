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
            'name'     => APP_NAME,
            'hotline'  => HOTLINE_DISPLAY,
            'office'   => OFFICE_DISPLAY,
            'email'    => CONTACT_EMAIL,
            'address'  => RESORT_ADDRESS,
            'maps_url' => MAPS_URL,
            'since'    => ESTABLISHED_YEAR,
        ];
    }
}
