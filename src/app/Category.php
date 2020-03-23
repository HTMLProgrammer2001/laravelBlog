<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Cviebrock\EloquentSluggable\Sluggable;
use App\Post;

class Category extends Model
{
    use Sluggable;

    protected $fillable = ['title'];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
