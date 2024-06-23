<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'url', 'steps', 'category_id', 'user_id'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

