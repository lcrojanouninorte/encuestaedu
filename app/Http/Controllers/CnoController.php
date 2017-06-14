<?php

namespace App\Http\Controllers;

use App\Cno;
use Illuminate\Http\Request;
use DB;

use Session;

class CnoController extends Controller
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
     * Display the specified resource.
     *
     * @param  \App\Cno  $cno
     * @return \Illuminate\Http\Response
     */
    public function cno_report($survey, $cod_area, $category=null, $level=null)
    {
        //buscar las nivel,  categorias y profesiones del area seleccionada
        

        if($cod_area){
            $results = DB::table('cnos')->select('categoria')->distinct()->where('prioridad', $cod_area)->get();;
        }
        if($category){
            $results = DB::table('cnos')->select('nivel')->distinct()
            ->where('prioridad', $cod_area)
            ->where('categoria', $category)
            ->get();
        }
        if($level){
             $results = DB::table('cnos')->select('ocupacion', 'desc_ocupacion')->distinct()
            ->where('prioridad', $cod_area)
            ->where('categoria', $category)
            ->where('nivel', $level)
            ->get();
        }


       // $results->where('prioridad', $cod_area)->get();

        return view('cno.show')->with([
            'results' => $results,
            'cod_area' => $cod_area,
            'category' => $category,
            'level' => $level,
            'survey' => $survey
        ] );

        return $cod_area;
    }
 


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cno  $cno
     * @return \Illuminate\Http\Response
     */
    public function show(Cno $cno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cno  $cno
     * @return \Illuminate\Http\Response
     */
    public function edit(Cno $cno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cno  $cno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cno $cno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cno  $cno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cno $cno)
    {
        //
    }
}
