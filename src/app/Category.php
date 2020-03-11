<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable;

    protected $fillable = ['title'];

    public function posts(){
        return $this->hasMany(Posts::class);
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
