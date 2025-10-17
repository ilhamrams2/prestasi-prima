<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresmaboardController extends Controller
{
       public function Eligible_profile()
    {


        return view('presmaboard.eligible') ;

    }

         public function leaderboard()
    {


        return view('presmaboard.leaderboard') ;

    }
}
