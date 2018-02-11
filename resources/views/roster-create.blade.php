@extends('layouts.app')
@section('content')
    <div class="row padme-10">
        <div class="col-sm-12 mt-4 mb-4 text-center">
            <h3 class="lead">
                <i class="fas fa-baseball-ball clr-primary"></i> <small style="padding-right:20px;">Innings: {{$innings}}</small>
                <i class="fas fa-child clr-primary"></i> <small style="padding-right:20px;">Players: {{$players}}</small>
                <i class="fas fa-clipboard clr-primary"></i> <small style="padding-right:20px;">League: {{$league}}</small>
                @if(isset($team_name))
                    <i class="fas fa-bullhorn clr-primary"></i> <small style="padding-right:20px;">Team Name: {{$team_name}}</small><br class="clear">
                @endif
            </h3>
        </div>

    </div>
    <div class="row padme-10">
        <div class="col-md-1"></div>
        <div class="col-sm-6" >

            <h2 class="text-center"><i class="fas fa-user-plus"></i> ENTER PLAYER NAMES</h2><br>

            {{ Form::open(array('method' => 'post', 'action' => 'RosterController@build')) }}

            @for($z=1;$z<=$players;$z++)
                @php
                    $t = 'p'.$z;
                @endphp
                <div class="form-group">
                    {{ Form::text($t,(isset($_SESSION[$t]) ? $_SESSION[$t] : ""), array('class' => 'form-control', 'placeholder' => 'Player '.$z)) }}
                </div>
            @endfor
            {{ Form::hidden('roster_id',$roster_id) }}
            {{ Form::hidden('innings',$innings) }}
            {{ Form::hidden('players',$players) }}
            {{ Form::hidden('team_name',$team_name) }}
            {{ Form::hidden('game_date',$game_date) }}
            {{ Form::hidden('league',$league) }}
            <div class="form-group">
                {{ Form::submit('Save', array('class'=>'btn bg-bb-primary clr-white')) }}
            </div>
            {{ Form::close() }}



        </div>
        <div class="col-md-5">
            {{--<div class="mt-5 mb-3"></div>--}}
            <div class="row">
                <div class="col-sm-12">
                    @php
                        $tip_number = mt_rand(1,2);
                    @endphp
                    @include('coach-tips.tip-'.$tip_number)
                </div>

            </div>

        </div>

    </div>


@endsection