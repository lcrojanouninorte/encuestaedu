<?php

namespace App\Http\Controllers;

use App\Cno;
use Illuminate\Http\Request;
use DB;
use PDF;
use App;
use Session;
use Mail;
use Auth;

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
              $level = $results[$level-1];
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
public function cno_profesion($cod_profesion, $level=null)
{
    $results = Cno::where("cod_profesion", $cod_profesion)
                
                ->with("skills", "knowledges", "outputs", "descoutputs")->get();
 


  // return $results;
    return view('cno.profesion')->with([
            'results' => $results[0],
            'cod_profesion' => $cod_profesion,
            'nivel' => $level
        ] );

}
public function cno_profesionmail($cod_profesion, $level=null)
{

        $user = Auth::user();
        if($user){
          $data = array(
                        'email' =>  $user->email,
                        'nombre' => $user->name,

                    );
            Mail::send('emails.perfil', $data, function ($message) use ($data) {

                $message->from('contacto@orienta-t.co', 'Orienta-t');

                $message->to( $data["email"])->subject('Perfil Ocupacional - Orienta-T'); //Cambiar fecha

            });
           Session::flash('alert-success', 'Mensaje Enviado Correctamente.');
        }else{
           Session::flash('alert-error', 'Mensaje No Enviado. Intente nuevamente');
        }

        return back()->with('message', 'success|Record updated.'); 
        

     
       

 

}

public function cno_profesionpdf($cod_profesion, $level=null)
{
 

    $results = Cno::where("cod_profesion", $cod_profesion)
                
                ->with("skills", "knowledges", "outputs")->get();
 

return PDF::loadFile('http://orienta-t.co/profesion/'.$cod_profesion.'/'.$level)->setOption('margin-top',0)
        ->setOption('margin-bottom',0)
        ->setOption('margin-left',0)
        ->setOption('margin-right',0)
        ->inline('orienta-t.pdf');
  // return $results;
 

              /*  PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
$pdf = PDF::loadView('cno.singlepdf', [
             'results' => $results[0],
             'cod_profesion' => $cod_profesion,
            'nivel' => $level
        ] );
//return $pdf->download('invoice.pdf');
return $pdf->stream();*/
    

}

     public function cno_reportpdf($survey, $cod_area, $category=null, $level=null)
    {
        //buscar las nivel,  categorias y profesiones del area seleccionada
        $data=[];
         Mail::send('emails.credenciales', $data, function ($message) use ($data) {

                $message->from('contacto@orienta-t.co', 'Orienta-t');

                $message->to( 'lcrojano@gmail.com')->subject('Mensaje desde Cita'); //Cambiar fecha

            });
           //  Session::flash('alert-success', 'Mensaje Enviado Correctamente, Pronto será revisado.')
         return PDF::loadFile('http://encuestaedu.app/profesion/4153/1')->inline('github.pdf');

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
        ini_set('max_execution_time', 300);  
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
