<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    //
    protected $fillable=[
        'subject',
        'description',
        'start_date',
        'end_date',
        'status',
        'user_id', 
    ];
}
