<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function aboutUs()
    {
        return $this->hasMany(AboutUs::class, 'theme_id');
    }
    public function contactUs()
    {
        return $this->hasMany(ContactUs::class, 'theme_id');
    }
    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'theme_id');
    }
    public function portfolio()
    {
        return $this->hasMany(Portfolio::class, 'theme_id');
    }
    public function service()
    {
        return $this->hasMany(Service::class, 'theme_id');
    }


}
