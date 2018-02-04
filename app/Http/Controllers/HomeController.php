<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
class HomeController extends Controller
{
    protected $connection = 'playpositions';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $created_by = auth()->user()->id;

        $user = User::find($created_by);

        return view('home')->with('roster', $user->roster);
    }
}
