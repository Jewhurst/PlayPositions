@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Welcome {{ auth()->user()->name }}, check out your rosters below.
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($roster))
                        <table class="table table-striped" style="width:100%;">
                            <tr>
                                <th>
                                    League
                                </th>
                                <th>
                                    Team
                                </th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Date Created
                                </th>
                                <th>
                                    View Roster
                                </th>
                            </tr>
                            @foreach($roster as $r)
                                <tr>
                                    <td>
                                        {{$r->league}}
                                    </td>
                                    <td>
                                        {{$r->team_name}}
                                    </td>
                                    <td>
                                        {{$r->game_date}}
                                    </td>
                                    <td>
                                        {{ $r->created_at }}
                                    </td>
                                    <td>
                                        <button class="btn bgclr-primary clr-white">
                                            View Roster
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
