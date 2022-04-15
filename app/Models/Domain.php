<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function views()
    {
        return $this->hasMany(Views::class, 'domain_id');   
    }
    
}