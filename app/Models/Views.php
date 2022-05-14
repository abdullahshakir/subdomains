<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Views extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $hidden = [
        'domain_id',
        'created_at',
        'updated_at',
    ];

    public function views()
    {
        return $this->hasMany(Views::class, 'domain_id');
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

}
