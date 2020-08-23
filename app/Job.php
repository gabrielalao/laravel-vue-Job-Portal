<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    // allow to store data to DB
    // protected $guarded = [];
    protected $fillable = ['user_id','company_id','title','slug','description','roles','category_id','position','address','type','status','last_date'];

    public function getRouteKeyName(){
        return 'slug';
    }
    // OneToMany (Inverse)
    public function company() {
        return $this->belongsTo('App\Company');
    }

    // Job has many users, an user has many jobs. Users : Jobs is M:N
    public function users() {
        return $this->belongsToMany(User::class)->withTimeStamps();
    }

    public function checkApplication(){
    	return \DB::table('job_user')->where('user_id',auth()->user()->id)->where('job_id',$this->id)->exists();
    }

}
