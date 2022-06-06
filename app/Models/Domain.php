<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function theme()
    {
        return $this->hasMany(Theme::class);
    }

    public function domainSection()
    {
        return $this->belongsTo(DomainSection::class);
    }

}
