<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['video_id', 'name', 'quantity'];

    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}

