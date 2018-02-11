@extends('layouts.app')
@section('content')
    <div class="row padme-10 mt-4 mb-4 text-center">
        <div class="col-sm-12">
            <p class="lead">
                <i class="fas fa-baseball-ball"></i> <small>Innings: {{$innings}}</small>
                <i class="fas fa-child"></i> <small>Players: {{$players}}</small>
                <i class="fas fa-clipboard"></i> <small>League: {{$league}}</small>
                @if(isset($team_name))
                    <i class="fas fa-bullhorn"></i> <small>Team Name: <b>{{$team_name}}</b></small><br class="clear">
                @endif
            </p>
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
            {{ Form::hidden('innings',$innings) }}
            {{ Form::hidden('players',$players) }}
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