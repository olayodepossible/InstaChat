<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /* 
    protected $fillable = [
        'caption', 'comment','image'
    ];
     this can be replace with "protected $guarded = []"
    */
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
