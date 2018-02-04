<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lineups extends Model
{
    protected $table ='lineups';
    protected $fillable = [
        'id',
        'roster_id',
        'roster_handle',
        'positions',
        'playername'
    ];

    /**
     * @return BelongsTo
     */
    public function roster(){
        return $this->belongsTo('App\Roster');
    }
}
