<?php

namespace App\Console\Commands;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Roster;
use App\Http\Controllers\RosterController;
use Illuminate\Console\Command;

class James extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = '
        james 
        {--id=} 
        {--innings=}
        {--players=}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Some test commands';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $positions=array('P','C','1st','2nd','SS','3rd','LF','CF','RF');
        $players=array('one','two','three','four','five','six','seven','eight','nine','ten','eleven');
        $innings = $this->option('innings');

        $result = false;

//        if ($this->confirm('Do you wish to continue?')) {
            while(!$result){
                $result = $this->fairRotation($players, $positions, $innings);
            }
            $c = 0;
            dd($result);

//            foreach($result as $r){
//                if($c == 0){
//
//                }
//                $echo = implode(', ',$r). "\n";
//                dd($r);
//                $c++;
//            }
//        }

//        $player = implode(', ', $ros_pos_list[0]);
//        //dd($ros_pos_list[0]);
//        //lets grab the first position
//        dd($player);
//        foreach($result as $r){
//            $position = implode(', ',$r);
//            $player = $ros_pos_list[0];
//            $name = $player[$c];
//            $pos_layout = explode();
//            //dd($r);
//            echo $name . ' -- ' . $position .'<br>';
//
//            $c++;
//        }
    }
    public function fairRotation($roster_names=[], $positions=[], $rotations=9, $off="<strong>X</strong>"){
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
