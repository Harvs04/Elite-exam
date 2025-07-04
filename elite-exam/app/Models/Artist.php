<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = ['code', 'name'];

    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
