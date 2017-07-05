<?php

namespace App\Http\Controllers;

use App\Survey;
use App\Question;
use App\Profile;
use App\Answer;
use App\Area;
use App\User;
use Illuminate\Http\Request;
use DB;

use Session;

use Auth;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Buscar todas las preguntas en Question
        $survey   = Survey::all();
        //

       // return Survey::all();
        return view('survey.survey')->with([
            'Survey'=> $survey 
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
        echo $request;
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
        $response["success"] = true;

        $data = $request->json()->all();
        $profile = $data["profile"];
        $survey = $data["survey"];
        $userData =[];
        if(!isset($data["profile"]["user_id"])){
            $userData = [
                    'name' => $data["profile"]["email"],
                    'email' => $data["profile"]["email"],
                    'password' =>  bcrypt("qwerty"),
            ];
        }

        //TODO: validar cada campo

      //  return $profile;
        $transaction = DB::transaction(function () use ($profile, $survey, $userData, $response) {
            //crear usuario
            // create user
            $user_id = "";
            if(!isset($profile["user_id"])){
                $newUser = User::create($userData);
                 
                Auth::loginUsingId($newUser->id);
                 $user_id = $newUser->id;
            }else{
                 $user_id = $profile["user_id"];
            }
            


            //crear el perfil si no existe
            $newProfile = Profile::firstOrNew(['user_id' => $user_id]); // your data
            $newProfile->edad = $profile["edad"];
            $newProfile->institucion = $profile["institucion"];
            $newProfile->curso = $profile["curso"];
            $newProfile->opciones = $profile["opciones"];
            $newProfile->verificacion = $profile["verificacion"];
            $newProfile->save();
            if( !$newProfile )
            {
                $response["success"] = false;
                throw new \Exception('No se creo el perfil');
            }

            //crear una encuesta y obtener su id
            $newSurvey = Survey::firstOrNew(['user_id' => $user_id]); // your data
            $newSurvey->nivel_preparacion = $profile["verificacion"];
            $newSurvey->save();
            
            
            //guardar respuestas
            foreach ($survey as $key => $question) {
                foreach ($question["options"] as $key => $option) {
                    if(isset($option["value"])){ //TODO no guardar encuesta incompleta
                        //$answers[] = array("option_id" => $option["id"], "value" => $key, 'survey_id'=>$newSurvey["id"] );
                        $newAnswer = Answer::firstOrNew( array('survey_id'=>$newSurvey["id"],'option_id' => $option["id"])); 
                        $newAnswer->value =   $option["value"];
                        $newAnswer->save();
                    }
                }
            }
            

           return $newSurvey;

        });
               
        $response["survey"]=$transaction;
        echo json_encode( $response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        //send 
        $results = DB::table('answers')
                ->select('options.area', DB::raw('SUM(answers.value) as total'), 'cod_area')
                ->leftJoin('options', 'answers.option_id', '=', 'options.id')
                ->leftJoin('surveys', 'surveys.id', '=', 'answers.survey_id')
                ->leftJoin('areas', 'areas.id', '=', 'options.area')
                ->where('surveys.id', $survey->id)
                ->orderBy('total', 'desc')
                ->groupBy('area')
                ->get();

        return view('survey.show')->with([
            'survey'=> $survey,
            'results' => $results
        ] );
    }

    public function showCaracterizacion(Survey $survey)
    {

        //Devolver 2 primeras categoria + ocupaciones

        //send 
        $areas = DB::table('answers')
                ->select('options.area', DB::raw('SUM(answers.value) as total'), 'cod_area', 'areas.desc_area')
                ->leftJoin('options', 'answers.option_id', '=', 'options.id')
                ->leftJoin('surveys', 'surveys.id', '=', 'answers.survey_id')
                ->leftJoin('areas', 'areas.id', '=', 'options.area')
                ->where('surveys.id', $survey->id)
                ->where('surveys.nivel_preparacion', $survey->nivel_preparacion)
                ->orderBy('total', 'desc')
                ->groupBy('area','cod_area','areas.desc_area' )
                ->limit(2)  
                ->get();

        //get survey level



        foreach ($areas as $key => $area) {
            $categoria = DB::table('cnos')
                ->select('categoria', 'categoria_desc', 'nivel')
                ->where('nivel', $survey->nivel_preparacion)
                ->where('area_id', $area->area)
                ->orderBy( 'nivel', 'asc')
                ->distinct()
                ->get();
            $area->categorias = $categoria;
        }

       
               // return  $areas ;

        return view('survey.caracterizacion')->with([
            'survey'=> $survey,
            'results' =>  $areas,
            'nivel' => $survey->nivel_preparacion
        ] );
    }

    public function showPDF(Survey $survey)
    {
        //send 
        $results = DB::table('answers')
                ->select('options.area', DB::raw('SUM(answers.value) as total'), 'cod_area')
                ->leftJoin('options', 'answers.option_id', '=', 'options.id')
                ->leftJoin('surveys', 'surveys.id', '=', 'answers.survey_id')
                ->leftJoin('areas', 'areas.id', '=', 'options.area')
                ->where('surveys.id', $survey->id)
                ->orderBy('total', 'desc')
                ->groupBy('area')
                ->limit(2)  
                ->get();

        return view('survey.show')->with([
            'survey'=> $survey,
            'results' => $results
        ] );
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Survey $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey)
    {
        //
        Survey::destroy($survey->id);
        Session::flash('alert-success', 'Borrado correctamente, puede crear una neva encuesta');
        return back()->with('message', 'success| Borrado correctamente.');

    }
}
