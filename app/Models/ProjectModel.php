<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    protected $table = 'projects';
    protected $fillable = [
        'id',
        'name',
        'price',
        'bedrooms',
        'bathrooms',
        'storeys',
        'garages',
    ];

    protected $casts = [
        'name' => 'string',
        'price' => 'integer',
        'bedrooms' => 'integer',
        'bathrooms' => 'integer',
        'storeys' => 'integer',
        'garages' => 'integer',
    ];
}
