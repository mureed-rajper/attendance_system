<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $fillable =['attendance','date','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
