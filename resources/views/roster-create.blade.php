@extends('layouts.app')
@section('content')
    <div class="col-12">
        <div class="">
            <form action="roster.php" method="POST" class="form">
                <br>
                <h2 class="tcenter">  ENTER PLAYER NAMES</h2><br>

                <?php ;?>

                <div class="modal-footer">
                    <div class="col-md-12">
                        <button type="submit" id="submit_players" name="submit_players" class="btn btn-warning">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    Hello
    {{--{{ $data->innings }}--}}

    {{--{{ Form::open(array('action' => 'RosterController@create')) }}--}}
    {{--//--}}
    {{--{{ Form::close() }}--}}
@endsection