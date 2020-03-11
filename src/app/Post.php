<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'content'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->belongsToMany(
            Tag::class,
            'posts_tags',
            'post_id',
            'tag_id'
        );
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function add($fields){
        $post = new static;
        $post->fill($fields);
        $post->user_id = 1;
        $post->save();

        return $post;
    }

    public function edit($fields){
        $this->fill($fields);
        $this->save();
        return $this;
    }

    public function remove(){
        Storage::delete('uploads/' . $this->image);
        $this->delete();
    }

    public function uploadImage($img){
        if($img == null) return;

        Storage::delete('uploads/' . $this->image);

        $filename = str_random(10) . '.' . $img->extension();
        $img->saveAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function setCategory($id){
        if(!$id) return;

        $this->category_id = $id;
        $this->save();
    }

    public function setTags($ids){
        if(!$ids) return;

        $this->tags->sync($ids);
    }

    public function setDraft(){
        $this->status = 0;
        $this->save();
    }

    public function setPublic(){
        $this->status = 1;
        $this->save();
    }

    public function toggleStatus($value){
        if($value == null)
            $this->setDraft();
        else
            $this->setPublic();
    }

    public function setFeature(){
        $this->is_featured = 1;
        $this->save();
    }

    public function setStandard(){
        $this->is_featured = 0;
        $this->save();
    }

    public function toggleFeature($value){
        if($value == null)
            $this->setStandard();
        else
            $this->setFeature();
    }

    public function getImage(){
        if($this->image == null)
            return '/img/no-image.png';

        return '/uploads/' . $this->image;
    }
}
