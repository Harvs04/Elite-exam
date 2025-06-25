<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['artist_id', 'year', 'name', 'sales', 'cover_pic_url'];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
