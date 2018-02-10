<?php

namespace App\Console\Commands;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Roster;

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
        players=array('one','two','three','four','five','six','seven','eight','nine','ten','eleven');
        $innings = $this->option('innings');


        while(!$result){
            $result = $this->fairRotation($ros_pos_list[0], $ros_pos_list[1], $data['innings']);
        }
//        $is_it_fair = $this->fairRotation($ros_pos_list[0], $ros_pos_list[1], $data['innings']);
////        $pn = $ros_pos_list[0];
        $c = 0;
        foreach($result as $r){
//            var_dump($i);
            echo implode(', ',$r).'<br>';
//            echo $pn[$c] . ' ' . $i[0] . ' ' . $i[1] . ' ' . $i[1] . '<br>';

        }
        $player = implode(', ', $ros_pos_list[0]);
        //dd($ros_pos_list[0]);
        //lets grab the first position
        dd($player);
        foreach($result as $r){
            $position = implode(', ',$r);
            $player = $ros_pos_list[0];
            $name = $player[$c];
            $pos_layout = explode();
            //dd($r);
            echo $name . ' -- ' . $position .'<br>';

            $c++;
        }
    }
}
