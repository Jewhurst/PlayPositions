<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
//    protected $connection = 'playpositions';
    protected $table ='rosters';
    protected $fillable = [
        'id',
        'user_id',
        'handle',
        'title',
        'names',
        'teamname',
        'innings',
        'players',
        'created_by',
        'table_html'
    ];
//    protected $dates = ['deleted_at'];
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function createLineup(){

    }
}
