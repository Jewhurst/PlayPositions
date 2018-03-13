<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Roster;
use Auth;
use Sujip\Guid\Guid;
use App\User;
use App\PositionLineup;

class ExternalController extends Controller
{
    public function index(){
        return redirect()->route('index');
    }
}
