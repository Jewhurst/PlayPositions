@extends('layouts.app')
@section('content')
    <div class="row padme-10">
        <div class="col-md-3"></div>
        <div class="col-sm-6">
            <h2 class="text-center"><i class="fa fa-plus-square"></i> ENTER PLAYER NAMES</h2><br>

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
        <div class="col-md-3"></div>
    </div>


@endsection