<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Roster;
use Auth;
use Sujip\Guid\Guid;
use App\User;

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

        $user = Auth::user();
        $generator = new \Nubs\RandomNameGenerator\Alliteration();
        $data = $request->all();
        $user_id = isset($user->id) ? $user->id : 0;
        $game_date = isset($data['game_date']) ? $data['game_date'] : '2018-01-01 12:00:00';
        $roster_id = guid();
        $team_name = isset($data['team_name']) ? $data['team_name'] : null;
        $team_slug = (isset($team_name) && $team_name != '') ? str_slug($team_name) : str_slug($generator->getName());
        $league = isset($data['league']) ? $data['league'] : null;
        $type = isset($data['type']) ? $data['type'] : null;
        $innings = isset($data['innings']) ? $data['innings'] : 9;
        $players = isset($data['players']) ? $data['players'] : 9;

        $roster = new Roster;
        $roster->user_id = $user_id;
        $roster->game_date = $game_date;
        $roster->roster_id = $roster_id;
        $roster->team_name = $team_name;
        $roster->team_slug = $team_slug;
        $roster->league = $league;
        $roster->type = $type;
        $roster->innings = $innings;
        $roster->players = $players;
        $roster->save();

        return view('roster-create', compact('innings', 'players', 'team_name', 'title','league'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        return view('roster-show')->with('roster', $user->roster);
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

    /**
     * @param Request $request
     * @return array
     */
    public function build(Request $request)
    {
        $data = $request->all();
        $ros_pos_list = $this->getPositionAndRosterList($data['players'],$data);
        $result=false;
        while(!$result){
            $result = $this->fairRotation($ros_pos_list[0], $ros_pos_list[1], $data['innings']);
        }
        $players = $ros_pos_list[0];
        $positions = $ros_pos_list[1];
        $innings = $data['innings'];
        //lets store each player and their positions per roster built
        //first store the roster with basic info,
        // 1. user that made it
        // 2. how many players/innings
        // 3. a handle to reference it
        // 4. maybe store which positions and player names on initial

        return view('roster-build', compact('result','players', 'positions', 'innings'));

    }


    /**
     * @param $playercount
     * @param $rawdata
     * @return array
     */
    public function getPositionAndRosterList($playercount, $data){
        $positions=array('P','C','1st','2nd','SS','3rd','LF','CF','RF');
        switch ($playercount) {
            case 6 :
                $positions=array('P','C','1st','2nd','SS','3rd');
                $roster=array(
                    $data['p1'],
                    $data['p2'],
                    $data['p3'],
                    $data['p4'],
                    $data['p5'],
                    $data['p6']
                );
                break;
            case 7 :
                $positions=array('P','C','1st','2nd','SS','3rd','CF');
                $roster=array(
                    $data['p1'],
                    $data['p2'],
                    $data['p3'],
                    $data['p4'],
                    $data['p5'],
                    $data['p6'],
                    $data['p7']
                );
                break;
            case 8 :
                $positions=array('P','C','1st','2nd','SS','3rd','LF','RF');
                $roster=array(
                    $data['p1'],
                    $data['p2'],
                    $data['p3'],
                    $data['p4'],
                    $data['p5'],
                    $data['p6'],
                    $data['p7'],
                    $data['p8']
                );
                break;
            case 9 :
                $roster=array(
                    $data['p1'],
                    $data['p2'],
                    $data['p3'],
                    $data['p4'],
                    $data['p5'],
                    $data['p6'],
                    $data['p7'],
                    $data['p8'],
                    $data['p9']
                );
                break;
            case 10 :
                $roster=array(
                    $data['p1'],
                    $data['p2'],
                    $data['p3'],
                    $data['p4'],
                    $data['p5'],
                    $data['p6'],
                    $data['p7'],
                    $data['p8'],
                    $data['p9'],
                    $data['p10']
                );
                break;
            case 11 :
                $roster=array(
                    $data['p1'],
                    $data['p2'],
                    $data['p3'],
                    $data['p4'],
                    $data['p5'],
                    $data['p6'],
                    $data['p7'],
                    $data['p8'],
                    $data['p9'],
                    $data['p10'],
                    $data['p11']
                );
                break;
            case 12 :
                $roster=array(
                    $data['p1'],
                    $data['p2'],
                    $data['p3'],
                    $data['p4'],
                    $data['p5'],
                    $data['p6'],
                    $data['p7'],
                    $data['p8'],
                    $data['p9'],
                    $data['p10'],
                    $data['p11'],
                    $data['p12']);
                break;
            case 13 :
                $roster=array(
                    $data['p1'],
                    $data['p2'],
                    $data['p3'],
                    $data['p4'],
                    $data['p5'],
                    $data['p6'],
                    $data['p7'],
                    $data['p8'],
                    $data['p9'],
                    $data['p10'],
                    $data['p11'],
                    $data['p12'],
                    $data['p13']
                );
                break;
            case 14 :
                $roster=array(
                    $data['p1'],
                    $data['p2'],
                    $data['p3'],
                    $data['p4'],
                    $data['p5'],
                    $data['p6'],
                    $data['p7'],
                    $data['p8'],
                    $data['p9'],
                    $data['p10'],
                    $data['p11'],
                    $data['p12'],
                    $data['p13'],
                    $data['p14']
                );
                break;
            case 15 :
                $roster=array(
                    $data['p1'],
                    $data['p2'],
                    $data['p3'],
                    $data['p4'],
                    $data['p5'],
                    $data['p6'],
                    $data['p7'],
                    $data['p8'],
                    $data['p9'],
                    $data['p10'],
                    $data['p11'],
                    $data['p12'],
                    $data['p13'],
                    $data['p14'],
                    $data['p15']
                );
                break;
            case 16 :
                $roster=array(
                    $data['p1'],
                    $data['p2'],
                    $data['p3'],
                    $data['p4'],
                    $data['p5'],
                    $data['p6'],
                    $data['p7'],
                    $data['p8'],
                    $data['p9'],
                    $data['p10'],
                    $data['p11'],
                    $data['p12'],
                    $data['p13'],
                    $data['p14'],
                    $data['p15'],
                    $data['p16']
                );
                break;
            case 17 :
                $roster=array(
                    $data['p1'],
                    $data['p2'],
                    $data['p3'],
                    $data['p4'],
                    $data['p5'],
                    $data['p6'],
                    $data['p7'],
                    $data['p8'],
                    $data['p9'],
                    $data['p10'],
                    $data['p11'],
                    $data['p12'],
                    $data['p13'],
                    $data['p14'],
                    $data['p15'],
                    $data['p16'],
                    $data['p17']
                );
                break;
            case 18 :
                $roster=array(
                    $data['p1'],
                    $data['p2'],
                    $data['p3'],
                    $data['p4'],
                    $data['p5'],
                    $data['p6'],
                    $data['p7'],
                    $data['p8'],
                    $data['p9'],
                    $data['p10'],
                    $data['p11'],
                    $data['p12'],
                    $data['p13'],
                    $data['p14'],
                    $data['p15'],
                    $data['p16'],
                    $data['p17'],
                    $data['p18']
                );
                break;
            default : break;
        }
        $return = array($roster, $positions);
        return $return;
    }

    /**
     * @param array $roster
     * @param array $positions
     * @param int $rotations
     * @param string $off
     * @return bool
     */
    public function fairRotation($roster_names=[], $positions=[], $rotations=9, $off="X"){
        $roster_name_count=sizeof($roster_names);
        $positions_count=sizeof($positions);
        //echo "<div>roster_count=$roster_count, positions_count=$positions_count</div>";
        $ons_avg=$positions_count/$roster_name_count;
        $ons_max=ceil($ons_avg);
        $ons_min=floor($ons_avg);
        //echo "<div>ons_avg=$ons_avg, ons_max=$ons_max, ons_min=$ons_min</div>";
        $off_avg=($roster_name_count-$positions_count)*$rotations/$roster_name_count;
        $off_max=ceil($off_avg);
        $off_min=floor($off_avg);
        //echo "<div>off_avg=$off_avg, off_max=$off_max, off_min=$off_min</div><br>";
        $positions=array_pad($positions,$roster_name_count,$off);  // sync positions with roster using sub identifier
        $positions_count=sizeof($positions);    // overwrite with updated count
        for($r=0; $r<$rotations; ++$r){
            shuffle($positions);
            $result[$r]=$positions;
        }
        //$color_result=$result;
        // unfiltered result:
        /*echo "<table border=1>";
            echo "<tr><th>#</th><th>",implode("</th><th>",$roster),"</th></tr>";
            foreach($result as $key=>$row){
                echo "<tr><th>",($key+1),"</th><td>",implode("</td><td>",$row),"</td></tr>";
            }
        echo "</table>";*/

        // Assess result and address conflicts...
        $iterations=0;
        $fair="?";
        $must_drop_count=0;
        $must_gain_count=0;
        while($fair!="true" && $iterations<15000){
            $must_gain=$must_drop=$may_gain=$may_drop=[];  // reset
            for($c=0; $c<$roster_name_count; ++$c){  // triage each column
                $col=array_column($result,$c);
                $val_counts[$c]=array_merge(array_fill_keys($positions,0),array_count_values($col));
                foreach($val_counts[$c] as $pos=>$cnt){
                    if(($pos!=$off && $cnt<$ons_min) || ($pos==$off && $cnt<$off_min)){
                        $must_gain[$c][$pos]=array_keys($col,$pos);  // column/player must gain this position, but not where row = value(s)
                    }elseif(($pos!=$off && $cnt>$ons_max) || ($pos==$off && $cnt>$off_max)){
                        $must_drop[$c][$pos]=array_keys($col,$pos);  // column/player must drop this position, but only where row = value(s)
                    }elseif(($pos!=$off && $cnt<$ons_max) || ($pos==$off && $cnt<$off_max)){
                        $may_gain[$c][$pos]=array_keys($col,$pos);  // column/player may gain this position, but not where row = value(s)
                    }elseif(($pos!=$off && $cnt>$ons_min) || ($pos==$off && $cnt>$off_min)){
                        $may_drop[$c][$pos]=array_keys($col,$pos);  // column/player may drop this position, but only where row = value(s)
                    }
                }
            }

            if(sizeof($must_gain)==0 && sizeof($must_drop)==0){
                $fair="true";
            }elseif(sizeof($must_drop)==$must_drop_count && sizeof($must_gain)==$must_gain_count){
                shuffle($positions);
                if($must_drop_count>0){
                    $result[current(current(current($must_drop)))]=$positions;
                }else{
                    $result[current(current(current($must_gain)))]=$positions;
                }
            }else{
                $must_drop_count=sizeof($must_drop);
                $must_gain_count=sizeof($must_gain);

                foreach($must_drop as $d1col=>$d1array){
                    ++$iterations;
                    foreach($d1array as $d1pos=>$d1keys){
                        foreach(array_diff_key($must_drop,array($d1col=>"")) as $d2col=>$d2array){  // dual-solution swap
                            foreach($d2array as $d2pos=>$d2keys){
                                if($d1pos!=$d2pos && (isset($must_gain[$d1col][$d2pos]) || isset($may_gain[$d1col][$d2pos]))){
                                    foreach($d2keys as $row){
                                        //echo "<div>checking {$roster[$d2col]}'s row($row) holding $d2pos vs {$roster[$d1col]}'s $d1pos ";
                                        //var_export($d1keys);
                                        //echo "</div>";
                                        if(in_array($row,$d1keys)){
                                            //echo "<div>row match on $row between {$roster[$d1col]} & {$roster[$d2col]}</div>";
                                            if(isset($must_gain[$d1col][$d2pos])){
                                                $result[$row][$d1col]=$d2pos;
                                                $result[$row][$d2col]=$d1pos;
                                                break(5);
                                            }elseif(isset($may_gain[$d1col][$d2pos])){
                                                $result[$row][$d1col]=$d2pos;
                                                $result[$row][$d2col]=$d1pos;
                                                break(5);
                                            }else{
                                                //echo "<div>No Eligible Swap: {$roster[$d1col]} doesn't need/want $d2pos @ row$row";
                                                //var_export(array_merge(array(),$must_gain[$d1col],$may_gain[$d1col]));
                                                //echo "</div>";
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        if($fair=="true"){
            //echo "<div>FAIR! after $iterations adjustments</div>";
            /*$duration = microtime(true) - $start;
            $durationtime = date("s",$duration);
            if($durationtime < 1){
                echo 'It took less than a second to build';
            }elseif($durationtime == 1){
                echo 'It took about 1 second to build';
            }else{
                echo "It took $durationtime seconds to build.";
            }*/
            return $result;  // $color_result for color
        }else{
            //echo 'There seems to have been an error. Please try again.';
            return false;
        }

    }
}
