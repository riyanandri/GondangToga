<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'latin',
        'indication',
        'category_id',
    ];

    public function sluggable()
    {
        return [
            'slug' => ['source' => 'name']
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
