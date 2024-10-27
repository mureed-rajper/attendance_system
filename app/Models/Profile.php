<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    // show user name
    public function user(){
        return $this->belongsTo(User::class);
    }
    //
    protected $fillable =[
        'name',
        'age',
        'class',
        'date_of_brith',
        'city',
        'img',
        'user_id',
    ];
}
