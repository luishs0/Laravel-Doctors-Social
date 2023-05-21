<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'price', 'description'];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
