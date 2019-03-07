<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'company_id',
        'email',
        'phone',
        'post',
        'comment',
        'photo_id'
    ];

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function getGravatarAttribute(){

        $hash = md5(strtolower(trim($this->attributes['email'])));

        return "http://www.gravatar.com/avatar/$hash";

    }
}
