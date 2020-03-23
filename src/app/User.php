<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email',
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
        $user->save();

        return $user;
    }

    public function edit($fields){
        $this->fill($fields);
        $this->save();
    }

    public function remove(){
        Storage::delete('uploads/' . $this->image);

        $this->delete();
    }

    public function uploadAvatar($img){
        if($img == null) return;

        if($this->avatar)
            \Storage::delete('uploads/' . $this->avatar);

        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $filename = substr(str_shuffle(str_repeat($pool, 5)), 0, 10) . '.' . $img->extension();
        $img->storeAs('uploads', $filename);
        $this->avatar = $filename;
        $this->save();
    }

    public function getAvatar(){
        if($this->avatar == null)
            return '/uploads/no-userImage.png';

        return '/uploads/' . $this->avatar;
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

    public function generatePassword($password){
        if($password != null){
            $this->password = bcrypt($password);
            $this->save();
        }
    }
}
