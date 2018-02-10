@extends('layouts.app')
@section('content')
    <div class="row padme-10">
        {{--<div class="col-md-3"></div>--}}
        <div class="col-sm-12">
            <table class="table">
                <thead class="">
                    <tr>
                        <th scope="col">Players</th>
                        @for($a=1;$a<=$innings;$a++)
                            <th scope="col">{{str_ordinal($a)}}</th>
                        @endfor
                    </tr>
                </thead>
                        @php
                            $count = count($players);
                            $d = 0;
                        @endphp

                        @for($b=1;$b<=$count;$b++)
                            <tr>
                                <td id="player-{{$d}}">{{$players[$d]}}</td>
                                @php
                                    $r = 0;
                                @endphp
                                @for($c=1;$c<=$innings;$c++)
                                    <td id="pos-{{$r}}-{{$d}}" scope="col">{{$result[$r][$d]}}</td>
                                    @php
                                        $r++;
                                    @endphp
                                @endfor
                                @php
                                    $d++;
                                @endphp
                            </tr>
                        @endfor
            </table>



        </div>
    </div>


@endsection