<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'website_id',
        'published_at',
    ];

    public function user()
    {
       return $this->belongsToMany(User::class);
    }

    public function website()
    {
       return $this->belongsTo(Website::class);
    }
}
