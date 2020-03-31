<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class Post extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'content', 'date'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
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

        if($this->image)
            \Storage::delete('uploads/' . $this->image);

        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $filename = substr(str_shuffle(str_repeat($pool, 5)), 0, 10) . '.' . $img->extension();
        $img->storeAs('uploads', $filename);
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

        $this->tags()->sync($ids);
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

    public function setFeatured(){
        $this->is_featured = 1;
        $this->save();
    }

    public function setStandard(){
        $this->is_featured = 0;
        $this->save();
    }

    public function toggleFeatured($value){
        if($value == null)
            $this->setStandard();
        else
            $this->setFeatured();
    }

    public function getImage(){
        if($this->image == null)
            return '/img/no-image.png';

        return '/uploads/' . $this->image;
    }

    public function setDateAttribute($value){
        $date = Carbon::createFromFormat('d/m/y', $value)->format('Y-m-d');

        $this->attributes['date'] = $date;
    }

    public function getDateAttribute($value){
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');

        return $date;
    }

    public function getCategoryTitle()
    {
        return ($this->category != null)
            ?   $this->category->title
            :   'Нет категории';
    }

    public function getTagsTitles()
    {
        return (!$this->tags->isEmpty())
            ?   implode(', ', $this->tags->pluck('title')->all())
            : 'Нет тегов';
    }

    public function getTagsId()
    {
        return (!$this->tags->isEmpty())
            ?   implode(', ', $this->tags->pluck('title')->all())
            : [];
    }

    public function hasPrevious(){
        return Post::where('id', '<', $this->id)->max('id');
    }

    public function getPrevious(){
        $postID = $this->hasPrevious();

        return Post::find($postID);
    }

    public function hasNext(){
        return Post::where('id', '>', $this->id)->min('id');
    }

    public function getNext(){
        $postID = $this->hasNext();

        return Post::find($postID);
    }

    public function related(){
        return self::all()->except($this->id);
    }
}
