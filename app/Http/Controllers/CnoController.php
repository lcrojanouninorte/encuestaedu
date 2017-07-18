<?php

namespace App\Http\Controllers;

use App\Cno;
use Illuminate\Http\Request;
use DB;
use PDF;
use App;
use Session;

use App\Preparationlevel;

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
        

        if($level>=0){
            /* $results = DB::table('cnos')->select('ocupacion', 'desc_ocupacion', 'cod_profesion', 'preparationlevels.desc')->distinct()
             ->leftJoin('preparationlevels', 'cnos.nivel', '=', 'preparationlevels.id')
            ->where('prioridad', $cod_area)
            ->where('categoria', $category)
            //->where('nivel', $level)
            ->get();*/

            $results = Preparationlevel::with(array('cnos' => function($query) use ($category, $cod_area)
            {
                 $query->where('prioridad', $cod_area)
                        ->where('categoria', $category);
            }))->get();
              $level = $results[$level];
              unset( $results[$level->id-1]);
        }else{
            if($category){
                $results = DB::table('cnos')->select('nivel')->distinct()
                ->where('prioridad', $cod_area)
                ->where('categoria', $category)
                ->get();
            }else{
                if($cod_area){
                    $results = DB::table('cnos')->select('categoria')->distinct()->where('prioridad', $cod_area)->get();;
                }
            }
        }
        
      // return $results;


       //$results->where('prioridad', $cod_area)->get();

        return view('cno.show')->with([
            'results' => $results,
            'cod_area' => $cod_area,
            'category' => $category,
            'level' => $level,
            'survey' => $survey
        ] );

        return $cod_area;
    }
public function cno_profesion($cod_porfesion, $level=null)
{
    $results = Cno::where("cod_profesion", $cod_porfesion)->with("skills", "knowledges", "outputs")->get();
    
    return view('cno.profesion')->with([
            'results' => $results[0],
            'nivel' => $level
        ] );

}

     public function cno_reportpdf($survey, $cod_area, $category=null, $level=null)
    {
        //buscar las nivel,  categorias y profesiones del area seleccionada
        

        /*if($cod_area){
            $results = DB::table('cnos')->select('categoria')->distinct()->where('prioridad', $cod_area)->get();;
        }
        if($category){
            $results = DB::table('cnos')->select('nivel')->distinct()
            ->where('prioridad', $cod_area)
            ->where('categoria', $category)
            ->get();
        }*/
        if($level){
             $results = DB::table('cnos')->select('ocupacion', 'desc_ocupacion', 'cod_profesion')->distinct()
            ->where('prioridad', $cod_area)
            ->where('categoria', $category)
            ->where('nivel', $level)
            ->get();

            foreach ($results as $key => $ocupacion) {
                
            $skill = DB::table('skills')->select('habilidad')->distinct()
            ->where('cod_profesion',$ocupacion->cod_profesion)
            ->get();

            $knowledge = DB::table('knowledge')->select('conocimiento')->distinct()
            ->where('cod_profesion',$ocupacion->cod_profesion)
            ->get();

            $knowledge = DB::table('knowledge')->select('conocimiento')->distinct()
            ->where('cod_profesion',$ocupacion->cod_profesion)
            ->get();

            $ocupacion->skills =  $skill;
            $ocupacion->knowledge = $knowledge;

            }
            

        }
//return $results;
PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
$pdf = PDF::loadView('cno.pdf', [
            'results' => $results,
            'cod_area' => $cod_area,
            'category' => $category,
            'level' => $level,
            'survey' => $survey
        ] );
//return $pdf->download('invoice.pdf');
return $pdf->stream();
//return $results;
       // $results->where('prioridad', $cod_area)->get();

        return view('cno.pdf')->with([
            'results' => $results,
            'cod_area' => $cod_area,
            'category' => $category,
            'level' => $level,
            'survey' => $survey
        ] );

       
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
