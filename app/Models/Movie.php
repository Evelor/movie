<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['localisation', 'name', 'year', 'director', 'image'];



    public function ratings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Rating::class);
    }

    public function getAverageRatingAttribute(): float
    {
        return round($this->ratings()->avg('rating'), 1);
    }

    public function ratedBy(User $user): bool
    {

       // $this->ratings()->allwherePivot('user_id', $user->id)->exists();
        return  $this->ratings()->where('user_id', $user->id)->exists();
    }
}
