<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ThemeSection;
use App\Models\Theme;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $themeId = Theme::insertGetId([
            'created_by' => 1,
            'name' => 'Nature',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        for ($section = 0; $section < 12; $section++) {
            ThemeSection::insert([
                'theme_id' => $themeId,
                'name' => $this->getSectionName($section),
                'route' => $this->getRoutes($section),
                'controller' => $this->getControllers($section),
                'attributes' => json_encode($this->getAttributes($section)),
                'attributes_data' => null,
                'is_multiple' => ($section == 2 || $section == 4) ? 1 : 0,
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

    private function getAttributes($attribute)
    {
        $sections = [
            ['Title', 'Sub Title', 'File'],
            ['File', 'Is Center'],
            ['Title', 'Sub Title', 'File'],
            ['Title', 'Sub Title'],
            ['Title', 'Type', 'file', 'category'],
            ['Title', 'Description', 'Color', 'Sub Title'],
            ['Name', 'email', 'phone', 'subject', 'service', 'location', 'message'],
            ['Title', 'File', 'Description'],
            ['Title', 'File', 'Description'],
            ['Address Title', 'address', 'Description', 'Phone', 'Fax', 'Email', 'Total Downloads', 'Doanload Text', 'Total Clients', 'Clients Text', 'Subscribe Description', 'Facebook Link', 'Subscriber Link', 'Privacy Link', 'Pinterest Link', 'Yahoo Link'],
            ['File', 'strength', 'Description'],
            ['Navbar', 'File'],
        ];
        return $sections[$attribute];
    }

    // private function getAttributesData($data)
    // {
    //     $sections = [
    //         ['png', 'sample', 'new', 'lahore', '1997-05-02'],
    //         ['jpg', 'sample', 'new', 'multan', '1997-05-03'],
    //         ['jpeg', 'sample', 'new', 'karachi', '1997-05-04'],
    //         ['svg', 'sample', 'new', 'fsd', '1997-05-05'],
    //         ['mp3', 'sample', 'new', 'islamabad', '1997-05-06']
    //     ];
    //     return $sections[$data];
    // }
}