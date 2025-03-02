<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image; 
use Carbon\Carbon;


class Actualite extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    protected $appends = ['formatted_date'];

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->created_at)->translatedFormat('d F Y à H:i');
    }


    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
