<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'site_url',
    ];

    public function users()
    {
       return $this->hasMany(User::class);
    }

    public function posts()
    {
       return $this->hasMany(Post::class);
    }
}
