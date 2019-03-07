<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $fillable = [
        'name',
        'email',
        'photo_id',
        'website'
    ];

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function employees(){
        return $this->hasMany('App\Employee');
    }

    public function getPlaceholder(){
        return $this->photo->file = "https://via.placeholder.com/100x100.jpg?text=" . $this->name;
    }
}
