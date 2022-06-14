<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $domainId = Domain::insertGetId([
            'created_by' => 1,
            'theme_id' => 1,
            'title' => 'my domain',
            'url' => 'my.domain.com:8000',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        for ($section = 0; $section < 5; $section++) {
            DomainSection::insert([
                'domain_id' => $domainId,
                'name' => $this->getSectionName($section),
                'route' => $this->getRoutes($section),
                'controller' => $this->getControllers($section),
                'attributes_data' => null,
                'visibility' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    private function getSectionName($name)
    {
        $sections = [
            'slider', 'gallery', 'service', 'team', 'portfolio', 'about', 'contact', 'connectivity', 'feature', 'footer', 'rating', 'header'
        ];
        return $sections[$name];
    }

    private function getRoutes($route)
    {
        $sections = [
            'sliders', 'galleries', 'services', 'teams', 'portfolios', 'abouts', 'contacts', 'connectivities', 'features', 'footers', 'ratings', 'headers'
        ];
        return $sections[$route];
    }

    private function getControllers($controller)
    {
        $sections = [
            'SliderController', 'GalleryController', 'ServiceController', 'TeamController','PortfolioController', 'AboutController', 'ContactController', 'ConnectivityController', 'FeatureController', 'FooterController', 'RatingController', 'HeaderController'
        ];
        return $sections[$controller];
    }
    
}