<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage(){
        return ($this -> image) ? '/storage/'. $this -> image: 'Todo later';
    }

    public function user(){
        return $this->belongsTo(User::class);  // creating OneToOne relationship
    }
}


/*
SETTING AUTHENTICATION:
composer require laravel/ui
php artisan ui vue--auth
npm install && npm run dev

BLADE: is a rendering template, it allow you to throw in the snippet of PHP in your view(html)


*/
