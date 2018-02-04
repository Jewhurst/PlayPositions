<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
//    protected $connection = 'playpositions';
//    protected $table ='rosters';
//    protected $fillable = [
//        'id',
//        'handle',
//        'created_by',
//        'table_html'
//    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
