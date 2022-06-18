<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainSection extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $cast = [
        'attributes_data' => 'array'
    ];

    public function domain()
    {
        return $this->hasMany(Domain::class, 'domain_id');
    }

    public function setAttributesDataAttribute($value)
    {
        $this->attributes['attributes_data'] = json_encode($value);
    }

}
