<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // Mass assignment
    // make all attributes mass assignable, you defined $guarded as empty array
    protected $guarded = [];
}
