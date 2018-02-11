<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PositionLineup extends Model
{
    protected $table ='position_lineup';
    protected $fillable = [
        'id',
        'roster_id',
        'player_position',
        'game_date',
        'team_name'
    ];

    /**
     * @return BelongsTo
     */
    public function roster(){
        return $this->belongsTo('App\Roster');
    }
}
