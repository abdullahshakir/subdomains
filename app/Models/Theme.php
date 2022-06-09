<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function domain()
    {
        return $this->hasMany(Domain::class, 'theme_id');
    }

    public function themeSections()
    {
        return $this->hasMany(ThemeSection::class);
    }
    
}
       