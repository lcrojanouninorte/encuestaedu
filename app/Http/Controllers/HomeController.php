<?php

namespace App\Http\Controllers;
use App\Survey;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        //Buscar encuestas del usuario actual
        $survey   = Survey::where('user_id', Auth::id())->first();
        return view('home')->with([
            'survey'=> $survey 
        ] );
        //return view('home');
    }
}
