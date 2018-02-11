@extends('layouts.app')
@section('content')
<div class="mt-3 mb-2"></div>
    <div class="row padme-10">
        <div class="col-md-6" >
            <div class="center">
                <a href="/"><img class="img-responsive" src="{{asset('images/bplogo.png')}}" alt="" width="80%" ></a>
            </div>
            <h3 class="text-center titillium mb-5" style="">
                Welcome to PlayPositions.com<br><b>Baseball Position Generator</b>
            </h3>

            <h4 class="text-justify questrial " style="padding:0 20px 20px 20px;">
                Easily build a random baseball position sheet and give each kid time to play each position. If players have to sit out they will sit out as fairly as possible.
            </h4>
            <h4 class="text-justify questrial" style="padding:0 20px 20px 20px;">
                This is great for T-Ball, coach and machine pitch lineups, or if you just need a quick list for a game with some friends!
                Select between 6 - 18 players and select 6 - 9 innings, and give each person a fair turn to learn.
            </h4>

        </div>
        <div class="col-md-6">
            <div class="card" style="">
                <div class="card-block">
                    <img
                         class="card-img-top"
                         src="{{asset('images/bg.jpg')}}"
                         alt="Baseball Position Generator"
                         width="100%"
                         style="padding-bottom:10px;"
                    />
                    <div style="padding:0 20px 20px 20px;">
                        <h4 class="clr-primary rock text-center">
                            Quick and easy. Free to use.
                        </h4>
                        <h5 class="clr-primary rock text-center">
                            <b>Giving everyone a turn to learn</b>
                        </h5>
                        <br>
                        <h4 class="card-title titillium clr-secondary text-center" style="line-height:1.5em;">
                            Build a lineup in just 3 steps
                        </h4>
                    </div>

                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item rock tcenter">1. Select how many players and innings</li>
                    <li class="list-group-item rock tcenter">2. Add Player Names</li>
                    <li class="list-group-item rock tcenter">3. View Lineup and Print</li>
                </ul>
                <div class="card-block">
                    <div class="row mt-3">
                        <div class="col-md-6 col-sm-12 offset-md-1 text-center">
                            <a style="width:75%;"
                               class="btn bgclr-red clr-white animated fadeIn"
                               data-toggle="modal"
                               data-target="#playerList">
                               <span class="clr-white boldme">GET STARTED</span>
                            </a>
                        </div>
                        <div class="col-md-6 col-sm-12 text-center">
                                <a class="btn bg-bb-primary clr-white animated fadeIn mousehand centersmall"
                                   style="width:75%;"
                                   href="https://docs.google.com/spreadsheets/d/1J2Nz_cjCh0dWdKgy6B9QTjiJHEznsY-P12mGjWP2fNc/pubhtml"
                                   target="_blank">
                                   <span class="clr-white boldme">PRINT YOUR OWN</span>
                                </a>
                        </div>
                    </div>
                    <br>

                </div>
            </div>

        </div>

    </div>


@endsection

