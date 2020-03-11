<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){
        return $this->hasMany(Posts::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public static function add($fields){
        $user = new static;
        $user->fill($fields);
        $user->password = bcrypt($fields['password']);
        $user->save();

        return $user;
    }

    public function edit($fields){
        $this->fill($fields);
        $this->password = bcrypt($fields['password']);
        $this->save();
    }

    public function remove(){
        Storage::delete('uploads/' . $this->image);

        $this->delete();
    }

    public function uploadAvatar($img){
        if($img == null) return;

        Storage::delete('uploads/' . $this->image);

        $filename = str_random(10) . '.' . $img->extension();
        $img->saveAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function getAvatar(){
        if($this->image == null)
            return '/img/no-userImage.png';

        return '/uploads/' . $this->image;
    }

    public function makeAdmin(){
        $this->is_admin = 1;
    }

    public function makeNormal(){
        $this->is_admin = 0;
    }

    public function toggleAdmin($value){
        if($value == null)
            $this->makeNormal();
        else
            $this->makeAdmin();
    }

    public function ban(){
        $this->status = 1;
    }

    public function unban(){
        $this->status = 0;
    }

    public function toggleBan($value){
        if($value == null)
            $this->unban();
        else
            $this->ban();
    }
}
