@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="padme-10">

                    <div class="clr-primary font-weight-bold h-100">
                        Welcome {{ auth()->user()->name }}, check out your rosters below or <a style="text-decoration: underline;" class="mousehand" data-toggle="modal" data-target="#playerList">create one</a>.
                    </div>
                    <div class="mt-3 mb-3"></div>
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
                                            {{$r->title}}
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($r->created_at)->toFormattedDateString()  }}
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
