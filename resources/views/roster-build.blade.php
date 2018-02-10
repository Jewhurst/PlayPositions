@extends('layouts.app')
@section('content')
    <div class="row padme-10">
        {{--<div class="col-md-3"></div>--}}
        <div class="col-sm-12">
            <table class="table">
                <thead class="">
                    {{--<tr>--}}
                        {{--<th scope="col">Players</th>--}}
                        {{--<th scope="col">Innings</th>--}}
                    {{--</tr>--}}
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
                    {{--<tr>--}}
                        {{--<td>{{$players[3]}}</td>--}}
                        {{--<td>{{$result[0][3]}}</td>--}}
                        {{--<td>{{$result[1][3]}}</td>--}}
                        {{--<td>{{$result[2][3]}}</td>--}}
                        {{--<td>{{$result[3][3]}}</td>--}}
                        {{--<td>{{$result[4][3]}}</td>--}}
                        {{--<td>{{$result[5][3]}}</td>--}}
                        {{--@if(isset($result[6][3]))--}}
                            {{--{{$result[6][3]}}--}}
                        {{--@endif--}}
                        {{--@if(isset($result[7][3]))--}}
                            {{--{{$result[7][3]}}--}}
                        {{--@endif--}}
                        {{--@if(isset($result[8][3]))--}}
                            {{--{{$result[8][3]}}--}}
                        {{--@endif--}}
                    {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td id="{{$players[0]}}">{{$players[0]}}</td>--}}
                            {{--@php--}}
                                {{--$r = 0;--}}
                            {{--@endphp--}}
                            {{--@for($c=1;$c<=$innings;$c++)--}}
                                {{--<td id="pos-{{$r}}-0" scope="col">{{$result[$r][0]}}</td>--}}
                                {{--@php--}}
                                    {{--$r++;--}}
                                {{--@endphp--}}
                            {{--@endfor--}}
                        {{--</tr>--}}

                        {{--<tr>--}}
                            {{--<td>{{$players[1]}}</td>--}}

                        {{--</tr>--}}

                        {{--<tr>--}}
                            {{--<td>{{$players[2]}}</td>--}}

                        {{--</tr>--}}

                        {{--<tr>--}}
                            {{--<td>{{$players[3]}}</td>--}}

                        {{--</tr>--}}

                        {{--<tr>--}}
                            {{--<td>{{$players[4]}}</td>--}}

                        {{--</tr>--}}

                        {{--<tr>--}}
                            {{--<td>{{$players[5]}}</td>--}}

                        {{--</tr>--}}
                        {{--@if(isset($players[6]))--}}

                        {{--@endif--}}
                        {{--@if(isset($players[7]))--}}

                        {{--@endif--}}
                        {{--@if(isset($players[8]))--}}

                        {{--@endif--}}
                        {{--@if(isset($players[9]))--}}

                        {{--@endif--}}
                        {{--@if(isset($players[10]))--}}

                        {{--@endif--}}
                        {{--@if(isset($players[11]))--}}

                        {{--@endif--}}
                        {{--@if(isset($players[12]))--}}

                        {{--@endif--}}
                        {{--@if(isset($players[13]))--}}

                        {{--@endif--}}
                        {{--@if(isset($players[14]))--}}

                        {{--@endif--}}
                        {{--@if(isset($players[15]))--}}

                        {{--@endif--}}
                        {{--@if(isset($players[16]))--}}

                        {{--@endif--}}
                        {{--@if(isset($players[17]))--}}

                        {{--@endif--}}

            </table>



        </div>
    </div>


@endsection