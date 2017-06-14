<?php

namespace App\Http\Controllers;

use App\Survey;
use App\Question;
use App\Profile;
use App\Answer;
use App\Area;
use Illuminate\Http\Request;
use DB;

use Session;


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

        //TODO: validar cada campo

      //  return $profile;
        $transaction = DB::transaction(function () use ($profile, $survey, $response) {
            //crear el perfil si no existe
            $newProfile = Profile::firstOrNew(['user_id' => $profile["user_id"]]); // your data
            $newProfile->edad = $profile["edad"];
            $newProfile->institucion = $profile["institucion"];
            $newProfile->curso = $profile["curso"];
            $newProfile->save();
            if( !$newProfile )
            {
                $response["success"] = false;
                throw new \Exception('No se creo el perfil');
            }

            //crear una encuesta y obtener su id
            $newSurvey = Survey::firstOrNew(['user_id' => $profile["user_id"]]); // your data
            $newSurvey->save();
            
            
            //guardar respuestas
            foreach ($survey as $key => $question) {
                foreach ($question["options"] as $key => $option) {
                    //$answers[] = array("option_id" => $option["id"], "value" => $key, 'survey_id'=>$newSurvey["id"] );
                    $newAnswer = Answer::firstOrNew( array('survey_id'=>$newSurvey["id"],'option_id' => $option["id"])); 
                    $newAnswer->value = 3-$key;
                    $newAnswer->save();
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
                ->groupBy('area')
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
