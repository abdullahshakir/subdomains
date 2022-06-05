<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainSection extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function domain()
    {
        return $this->hasMany(Domain::class, 'domain_id');
    }

}
