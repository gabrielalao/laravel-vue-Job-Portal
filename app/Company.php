<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'cname', 'user_id', 'slug','address','phone','website','logo','cover_photo','slogan','description'
    ];

    /*
        If you would like model binding to use a database column other than id when retrieving a given model class,
        you may override the getRouteKeyName method on the Eloquent model:
        https://laravel.com/docs/5.8/routing
    */
    public function getRouteKeyName(){
        return 'slug';
    }

    // company has 1:M jobs
    public function jobs() {
        return $this->hasMany('App\Job');
    }
}
