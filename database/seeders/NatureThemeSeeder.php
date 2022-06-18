<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Theme;

class NatureThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $theme = Theme::create([
            'created_by' => 1,
            'name' => 'Nature'
        ]);
        $sections = $this->getSections();
        foreach ($sections as $section) {
            $theme->themeSections()->create([
                'name' => $section['name'],
                'route' => $section['route'],
                'controller' => $section['controller'],
                'attributes' => json_encode($section['attributes']),
                'attributes_data' => null,
                'is_multiple' => $section['is_multiple']
            ]);
        }
    }

    private function getSections()
    {
        return [
            [
                'name' => 'about',
                'route' => 'about',
                'controller' => 'AboutController',
                'attributes' => [
                    ["name" => "title", "label" => "Title", "type" => "text"],
                    ["name" => "color", "label" => "Color", "type" => "text"],
                    ["name" => "description", "label" => "Description", "type" => "text"]
                ],
                'is_multiple' => true
            ],
            [
                'name' => 'connectivity',
                'route' => 'connectivities',
                'controller' => 'ConnectivityController',
                'attributes' => [
                    ["name" => "title", "label" => "Title", "type" => "text"],
                    ["name" => "description", "label" => "Description", "type" => "text"],
                    ["name" => "image", "label" => "Image", "type" => "file"]
                ],
                'is_multiple' => true
            ],
            [
                'name' => 'contact',
                'route' => 'contacts',
                'controller' => 'ContactController',
                'attributes' => [
                    ["name" => "name", "label" => "Name", "type" => "text"],
                    ["name" => "email", "label" => "Email", "type" => "text"],
                    ["name" => "phone", "label" => "Phone", "type" => "numeric"],
                    ["name" => "message", "label" => "Message", "type" => "text"],
                    ["name" => "subject", "label" => "Subject", "type" => "text"],
                    ["name" => "created date", "label" => "Created Date", "type" => "date"]
                ],
                'is_multiple' => true
            ],
            [
                'name' => 'feature',
                'route' => 'features',
                'controller' => 'FeatureController',
                'attributes' => [
                    ["name" => "title", "label" => "Title", "type" => "text"],
                    ["name" => "file", "label" => "File", "type" => "file"],
                    ["name" => "description", "label" => "Description", "type" => "text"]
                ],
                'is_multiple' => true
            ],
            [
                'name' => 'footer',
                'route' => 'footers',
                'controller' => 'FooterController',
                'attributes' => [
                    ["name" => "address_title", "label" => "Address Title", "type" => "text"],
                    ["name" => "address", "label" => "Address", "type" => "text"],
                    ["name" => "phone", "label" => "Phone", "type" => "numeric"],
                    ["name" => "fax", "label" => "Fax", "type" => "numeric"],
                    ["name" => "email", "label" => "Email", "type" => "text"],
                    ["name" => "download_text", "label" => "Download Text", "type" => "text"],
                    ["name" => "total_downloads", "label" => "Total Downloads", "type" => "numeric"],
                    ["name" => "total_clients", "label" => "Total Clients", "type" => "numeric"],
                    ["name" => "client_text", "label" => "Client Text", "type" => "text"],
                    ["name" => "subscribe_description", "label" => "Subscribe Description", "type" => "text"],
                    ["name" => "subscriber_link", "label" => "Subscriber Link", "type" => "text"],
                    ["name" => "facebook_link", "label" => "Facebook Link", "type" => "text"],
                    ["name" => "yahoo_link", "label" => "Yahoo Link", "type" => "text"],
                    ["name" => "pinterest_link", "label" => "Pinterest Link", "type" => "text"],
                    ["name" => "privacy_link", "label" => "Privacy Link", "type" => "text"],
                    ["name" => "term_and_condition_link", "label" => "Term and Condition Link", "type" => "text"],
                    ["name" => "created_date", "label" => "Created Date", "type" => "date"]
                ],
                'is_multiple' => false
            ],
            [
                'name' => 'gallery',
                'route' => 'galleries',
                'controller' => 'GalleryController',
                'attributes' => [
                    ["name" => "title", "label" => "title", "type" => "text"],
                    ["name" => "title", "label" => "title", "type" => "text"]
                ],
                'is_multiple' => true
            ],
            [
                'name' => 'header',
                'route' => 'headers',
                'controller' => 'HeaderController',
                'attributes' => [
                    ["name" => "title", "label" => "title", "type" => "text"],
                    ["name" => "title", "label" => "title", "type" => "text"]
                ],
                'is_multiple' => false
            ],
            [
                'name' => 'portfolio',
                'route' => 'portfolios',
                'controller' => 'PortfolioController',
                'attributes' => [
                    ["name" => "title", "label" => "title", "type" => "text"],
                    ["name" => "title", "label" => "title", "type" => "text"]
                ],
                'is_multiple' => true
            ],
            [
                'name' => 'rating',
                'route' => 'ratings',
                'controller' => 'RatingController',
                'attributes' => [
                    ["name" => "title", "label" => "title", "type" => "text"],
                    ["name" => "title", "label" => "title", "type" => "text"]
                ],
                'is_multiple' => true
            ],
            [
                'name' => 'service',
                'route' => 'services',
                'controller' => 'ServiceController',
                'attributes' => [
                    ["name" => "title", "label" => "title", "type" => "text"],
                    ["name" => "title", "label" => "title", "type" => "text"]
                ],
                'is_multiple' => true
            ],
            [
                'name' => 'slider',
                'route' => 'sliders',
                'controller' => 'SliderController',
                'attributes' => [
                    ["name" => "title", "label" => "title", "type" => "text"],
                    ["name" => "title", "label" => "title", "type" => "text"]
                ],
                'is_multiple' => true
            ],
            [
                'name' => 'team',
                'route' => 'teams',
                'controller' => 'TeamController',
                'attributes' => [
                    ["name" => "title", "label" => "title", "type" => "text"],
                    ["name" => "title", "label" => "title", "type" => "text"]
                ],
                'is_multiple' => true
            ],
            [
                'name' => 'subdomain',
                'route' => 'subdomains',
                'controller' => 'SubdomainController',
                'attributes' => [
                    ["name" => "title", "label" => "title", "type" => "text"],
                    ["name" => "title", "label" => "title", "type" => "text"]
                ],
                'is_multiple' => true
            ]
        ];
    }

}
