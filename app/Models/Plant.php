<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory,Sluggable;

    const TABLE = 'plants';

    protected $table = self::TABLE;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'latin',
        'image',
        'information'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function article()
    {
        return $this->hasMany(Article::class);
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
