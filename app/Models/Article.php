<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    const TABLE = 'articles';

    protected $table = self::TABLE;

    protected $fillable = [
        'plant_id',
        'title',
        'content'
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }
}
