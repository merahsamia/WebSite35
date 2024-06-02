<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Actualite; 

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['actualite_id', 'url', 'caption'];

    public function actualite()
    {
        return $this->belongsTo(Actualite::class);
    }
}
