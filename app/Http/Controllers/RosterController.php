<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Roster;

class RosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->all();
        if (isset($data['innings'])) {
            $innings = $data['innings'];
        }

        if (isset($data['players'])) {
            $players = $data['players'];
        }
        return view('roster-create', compact('innings', 'players'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
//        //$innings, $players
//        $innings = 7;
//        $players = 9;
//        $data = array(
//            'innings' => $innings,
//            'players' => $players
//        );
//        return view('roster-create', compact('innings', 'players'));
        $roster = new Roster;
        $roster->user_id = 2;
        $roster->title = 'Another title';
        $roster->handle = base64_encode(urlencode(mt_rand(1000,10000000)));
        $roster->names = 'steve, lara, tom, abe, bill';
        $roster->teamname = 'muck dogs';
        $roster->league = 'AA';
        $roster->type = 'Baseball';
        $roster->innings = 9;
        $roster->players = 9;
        $roster->save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
