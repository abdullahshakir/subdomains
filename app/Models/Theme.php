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
        return $this->belongsTo(Domain::class);
    }
    
    public function themeSection()
    {
        return $this->belongsTo(ThemeSection::class);
    }
}
       