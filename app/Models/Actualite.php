<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image; 


class Actualite extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
