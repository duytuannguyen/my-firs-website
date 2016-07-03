<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    protected $table = 'bets';

    protected $fillable = ['id', 'user_id', 'match_id', 'choose_win', 'coins_bet', 'created_at'];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function match(){
    	return $this->belongsTo('App\Match');
    }
}
