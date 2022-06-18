<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeSection extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function theme()
    {
        return $this->hasMany(Theme::class, 'theme_id');
    }

}