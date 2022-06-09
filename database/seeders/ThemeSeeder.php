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

        for ($section = 0; $section < 5; $section++) {
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
            'gallery', 'service', 'about', 'rating', 'header'
        ];
        return $sections[$name];
    }

    private function getRoutes($route)
    {
        $sections = [
            'galleries', 'services', 'abouts', 'ratings', 'headers'
        ];
        return $sections[$route];
    }

    private function getControllers($controller)
    {
        $sections = [
            'GalleryController', 'ServiceController', 'AboutController', 'RatingController', 'HeaderController'
        ];
        return $sections[$controller];
    }

    private function getAttributes($attribute)
    {
        $sections = [
            ['file', 'name', 'type', 'address', 'date'],
            ['file', 'name', 'type', 'address', 'date'],
            ['file', 'name', 'type', 'address', 'date'],
            ['file', 'name', 'type', 'address', 'date'],
            ['file', 'name', 'type', 'address', 'date']
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