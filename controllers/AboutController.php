<?php

declare(strict_types=1);

/** GT HOMES — About Controller */
class AboutController extends BaseController
{
    private AboutBLL $bll;

    public function __construct()
    {
        $this->bll = new AboutBLL();
    }

    public function index(): array
    {
        $aboutData = $this->bll->getAboutData();

        return [
            'pageTitle'       => 'About Us | ' . APP_NAME,
            'metaDescription' => 'Discover GT HOMES Holiday Resort (Pvt) Ltd — our story, values, hospitality philosophy, and resort experiences.',
            'aboutData'       => $aboutData,
        ];
    }
}
