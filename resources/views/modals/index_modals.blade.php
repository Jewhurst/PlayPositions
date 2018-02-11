<div class="modal fade" id="playerList" tabindex="-1" role="dialog" aria-labelledby="playerListTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="playerListTitle">Select how many players and innings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    {{ Form::open(array('method' => 'post', 'route' => 'roster.create')) }}
                    <div class="row">

                        <div class="col-sm-4 text-center">
                            <div class="input-group">
                                <div class="input-group-prepend" style="padding:0px 10px;">
                                    <span class="input-group-text">{{Form::label('players', 'Players')}} </span>
                                </div>
                                <div class="form-group">
                                    {{ Form::select(
                                        'players',
                                        array(
                                            '6'=>6,
                                            '7'=>7,
                                            '8'=>8,
                                            '9'=>9,
                                            '10'=>10,
                                            '11'=>11,
                                            '12'=>12,
                                            '13'=>13,
                                            '14'=>14,
                                            '15'=>15,
                                            '16'=>16,
                                            '17'=>17,
                                            '18'=>18
                                        ))
                                     }}
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend" style="padding:0px 10px;">
                                    <span class="input-group-text">{{Form::label('innings', 'Innings')}} </span>
                                </div>
                                <div class="form-group">
                                    {{ Form::select('innings', array('6'=>6,'7'=>7,'8'=>8,'9'=>9)) }}
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend" style="padding:0px 10px;">
                                    <span class="input-group-text">{{Form::label('league', 'League')}} </span>
                                </div>
                                <div class="form-group">
                                    {{ Form::select('league', array('A'=>'A','AA'=>'AA','AAA'=>'AAA')) }}
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-8 text-center">
                            <div class="mt-3 mb-3"></div>
                            <div class="input-group">
                                <div class="input-group-prepend" style="padding:0px 10px;">
                                    <span class="input-group-text">{{Form::label('team_name', 'Team Name')}} </span>
                                </div>
                                    {{Form::text('team_name','',array('class'=>'form-control'))}}
                            </div>


                            {{--<div class="input-group">--}}
                                {{--<div class="input-group-prepend" style="padding:0px 10px;">--}}
                                    {{--<span class="input-group-text">{{Form::label('game_date', 'Game Date')}} </span>--}}
                                {{--</div>--}}
                                {{----}}
                                {{----}}
                                {{----}}
                                {{----}}
                            {{--</div>--}}


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 text-center">

                        </div>
                    </div>


                    {{ Form::hidden('type','baseball') }}
                        <div class="form-group">
                            {{ Form::submit('Build Roster', array('class'=>'btn bg-bb-primary clr-white')) }}
                        </div>
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="oddwarning" tabindex="-1" role="dialog" aria-labelledby="oddwarningLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="oddwarningLabel">You're about to use less than 9 innings!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <h4>Some problems you may face:</h4>
                <ul>
                    <li>Some players may not play each position.</li>
                    <li>If players are sitting out, some players may sit out more than others unevenly. However, each player will sit out fairly unless there is an odd number of players or inning</li>
                </ul>
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bgclr-red clr-white " style="width:100%" data-dismiss="modal" >I UNDERSTAND</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="plywarning" tabindex="-1" role="dialog" aria-labelledby="plywarningLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="plywarningLabel">You're about to use more or less than 9 players!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <h4>Some problems you may face using under 9 players:</h4>
                <ul>
                    <li>Not each position will be utilized.</li>
                    <li>However, key positions are used under 9 players:
                        <ul>
                            <li>6 players use positions C, P, 1<sup>st</sup>, 2<sup>nd</sup>, 3<sup>rd</sup>, SS</li>
                            <li>7 players use positions C, P, 1<sup>st</sup>, 2<sup>nd</sup>, 3<sup>rd</sup>, SS, CF</li>
                            <li>8 players use positions C, P, 1<sup>st</sup>, 2<sup>nd</sup>, 3<sup>rd</sup>, SS, LF, RF</li>
                        </ul>
                    </li>
                </ul>
                <h4>Some problems you may face using over 9 players:</h4>
                <ul>
                    <li>Players will sit out as typically only 9 are allowed on field.</li>
                    <li>Player will each sit out the fair amount of times in 9 innings.</li>
                    <li>Some players may sit out more than others unevenly. However, each player will sit out fairly unless there is an odd number of players or inning</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bgclr-red clr-white " style="width:100%" data-dismiss="modal" >I UNDERSTAND</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="plyinnwarning" tabindex="-1" role="dialog" aria-labelledby="plyinnwarningLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="plyinnwarningLabel">Important Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <h4>Some problems you may face using less than 9 innings:</h4>
                <ul>
                    <li>Some players may not play each position.</li>
                    <li>If players are sitting out, some players may sit out more than others unevenly. However, each player will sit out fairly unless there is an odd number of players or inning</li>
                </ul>
                <h4>Some problems you may face using under 9 players:</h4>
                <ul>
                    <li>Not each position will be utilized.</li>
                    <li>However, key positions are used under 9 players:
                        <ul>
                            <li>6 players use positions C, P, 1<sup>st</sup>, 2<sup>nd</sup>, 3<sup>rd</sup>, SS</li>
                            <li>7 players use positions C, P, 1<sup>st</sup>, 2<sup>nd</sup>, 3<sup>rd</sup>, SS, CF</li>
                            <li>8 players use positions C, P, 1<sup>st</sup>, 2<sup>nd</sup>, 3<sup>rd</sup>, SS, LF, RF</li>
                        </ul>
                    </li>
                </ul>
                <h4>Some problems you may face using over 9 players:</h4>
                <ul>
                    <li>Players will sit out as typically only 9 are allowed on field.</li>
                    <li>Player will each sit out the fair amount of times in 9 innings.</li>
                    <li>Some players may sit out more than others unevenly. However, each player will sit out fairly unless there is an odd number of players or inning</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bgclr-red clr-white" style="width:100%" data-dismiss="modal" >I UNDERSTAND</button>
            </div>
        </div>
    </div>
</div>

