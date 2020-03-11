<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function author(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->belongsTo(Posts::class);
    }

    public function allow(){
        $this->status = 1;
        $this->save();
    }

    public function disallow(){
        $this->status = 0;
        $this->save();
    }

    public function toggleStatus(){
        if($this->status == 1)
            $this->disallow();
        else
            $this->allow();
    }

    public function remove(){
        $this->delete();
    }
}
