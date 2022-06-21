<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DomainSection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function homeData($domainId, DomainSection $DomainSection)
    {
        $aboutSection =  $DomainSection->where([['domain_id', 2], ['name', 'about']])->select('attributes_data')->first();
        $about = json_decode($aboutSection['attributes_data'], true);
        $connectivitySection =  $DomainSection->where([['domain_id', 2], ['name', 'connectivity']])->select('attributes_data')->first();
        $connectivity = json_decode($connectivitySection['attributes_data'], true);
        $featureSection =  $DomainSection->where([['domain_id', 2], ['name', 'feature']])->select('attributes_data')->first();
        $feature = json_decode($featureSection['attributes_data'], true);
        $footerSection =  $DomainSection->where([['domain_id', 2], ['name', 'footer']])->select('attributes_data')->first();
        $footer = json_decode($footerSection['attributes_data'], true);
        $gallerySection =  $DomainSection->where([['domain_id', 2], ['name', 'gallery']])->select('attributes_data')->first();
        $gallery = json_decode($gallerySection['attributes_data'], true);
        $headerSection =  $DomainSection->where([['domain_id', 2], ['name', 'header']])->select('attributes_data')->first();
        $header = json_decode($headerSection['attributes_data'], true);
        $portfolioSection =  $DomainSection->where([['domain_id', 2], ['name', 'portfolio']])->select('attributes_data')->first();
        $portfolio = json_decode($portfolioSection['attributes_data'], true);
        $ratinSection =  $DomainSection->where([['domain_id', 2], ['name', 'rating']])->select('attributes_data')->first();
        $rating = json_decode($ratinSection['attributes_data'], true);
        $sericeSection =  $DomainSection->where([['domain_id', 2], ['name', 'service']])->select('attributes_data')->first();
        $service = json_decode($sericeSection['attributes_data'], true);
        $sliderSection =  $DomainSection->where([['domain_id', 2], ['name', 'slider']])->select('attributes_data')->first();
        $slider = json_decode($sliderSection['attributes_data'], true);
        $teamSection =  $DomainSection->where([['domain_id', 2], ['name', 'team']])->select('attributes_data')->first();
        $team = json_decode($teamSection['attributes_data'], true);
        return view('pages.home-page')
            ->with('gallery', $gallery)
            ->with('abouts', $about)
            ->with('sliders', $slider)
            ->with('features', $feature)
            ->with('services', $service)
            ->with('headers', $header)
            ->with('portfolios', $portfolio)
            ->with('connectivities', $connectivity)
            ->with('footer', $footer['first'])
            ->with('teams', $team)
            ->with('ratings', $rating);
    }
    
}
