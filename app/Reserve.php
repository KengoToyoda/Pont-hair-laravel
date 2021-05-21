<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;


class Reserve extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'tel', 
        'menu', 
        'dateTime', 
        'user_id',
    ];
    
    
    public function reserve()
    {
        return $this->belongTo('App\User');
    }
}
