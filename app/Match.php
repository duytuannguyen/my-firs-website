<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    //
    protected $table = 'matches';

    protected $fillable = [
    	'id',
    	'home_team',
    	'visitor_team',
    	'home_win',
    	'visitor_win',
    	'zero_zero',
    	'time_begin',
    	'time_end',
    	'home_score',
    	'visitor_score',
    	'role',
    	'created_at',
    	'update_at',
    ];

    public function bets(){
        return $this->hasMany('App\Bet');
    }

}
