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

use Validator;

use Mail;

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
     * instrucciones.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function instrucciones(Request $request)
    {
        return view('survey.instructions');
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
       /* if(!isset($data["profile"]["user_id"])){

            //TODO: validar lado servidor e-mail
            $userData = [
                    'name' => $profile["nombre"],
                    'email' => $profile["email"],
                    'password' =>  bcrypt($profile["contrasena"]),
            ];
        }*/

        //TODO: validar cada campo

      //  return $profile;
        $transaction = DB::transaction(function () use ($profile, $survey, $userData, $response) {
            //crear usuario
            // create user
            $user_id = "";
           /* if(!isset($profile["user_id"])){
                $newUser = User::create($userData);
                $data = array(
                        'email' =>  $newUser->email,
                        'nombre' => $newUser->name,
                        'password' => $profile["contrasena"],
                    );
                if ($newUser) {
                    //send mail with credential
                     Mail::send('emails.credenciales', $data, function ($message) use ($data) {

                            $message->from('contacto@orienta-t.co', 'Orienta-t');

                            $message->to( $data["email"])->subject('Resultados Orienta-t'); //Cambiar fecha

                    });
                }
                Auth::loginUsingId($newUser->id);
                $user_id = $newUser->id;

                  //crear el perfil si no existe, o update el existente
                $newProfile = Profile::firstOrNew(['user_id' => $user_id]); // your data
                $newProfile->edad = $profile["edad"];
                $newProfile->institucion = $profile["institucion"];
                $newProfile->curso = $profile["curso"];
                //$newProfile->opciones = $profile["opciones"];
                $newProfile->opciones = 1;
                //$newProfile->verificacion = $profile["verificacion"];
                $newProfile->nombre = $profile["nombre"];
                $newProfile->save();
                if( !$newProfile )
                {
                    $response["success"] = false;
                    throw new \Exception('No se creo el perfil');
                }
            }else{
                 $user_id = $profile["user_id"];
            }*/
            
            $user_id = $profile["user_id"];


           

            //crear una encuesta y obtener su id
            $newSurvey = Survey::firstOrNew(['user_id' => $user_id]); // your data
            //$newSurvey->nivel_preparacion = $profile["opciones"];
            $newSurvey->nivel_preparacion = 1;
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
        //enviar correo con usuario y contraseña si todo salio ok

        $response["survey"]=$transaction;
        echo json_encode( $response);
    }

    public function register_orientate(Request $request)
    {
        //

        $validator = Validator::make($request->all(), [
            //'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            //'contrasena' => 'required|string|min:6|confirmed',
        ]);

         if ($validator->fails()) {
            Session::flash('alert-success', 'Este e-mail ya ha sido tomado, intente recuperar su contraseña');
            return redirect('/password/reset')->with('message', '')
                        ->withErrors($validator)
                        ->withInput();
        }



        $response["success"] = true;

        $data = $request->json()->all();
 
        $userData =[];
        //TODO: validar lado servidor e-mail
        $userData = [
                    'name' => $request->input("nombre"),
                    'email' => $request->input("email"),
                    'password' =>  bcrypt($request->input("contrasena")),
        ];

        $userProfile =[];
        //TODO: validar lado servidor e-mail
        $userProfile = [
                    'edad' => $request->input("edad"),
                    'institucion' => $request->input("institucion"),
                    'grado' => $request->input("grado"),
                    'apellido' => $request->input("apellido"),
                    'nombre' => $request->input("nombre"),
                    'contrasena' =>  $request->input("contrasena"),
                    
        ];
         

        $transaction = DB::transaction(function () use ($userProfile, $userData, $response) {
            //crear usuario
            // create user
            $user_id = "";
            //check if user existe:
 

            $newUser = User::create($userData);

            //send mail with credential
            $data = array(
                        'email' =>  $newUser->email,
                        'nombre' => $newUser->name,
                        'password' => $userProfile["contrasena"],
            );
            if ($newUser) {
                Mail::send('emails.credenciales', $data, function ($message) use ($data) {

                            $message->from('contacto@orienta-t.co', 'Orienta-t');

                            $message->to( $data["email"])->subject('Resultados Orienta-t'); //Cambiar fecha

                    });
                }

                Auth::loginUsingId($newUser->id);
                $user_id = $newUser->id;
                $userData["id"]= $newUser->id;


                //crear el perfil si no existe, o update el existente
                $newProfile = Profile::firstOrNew(['user_id' => $user_id]); // your data
                $newProfile->edad = $userProfile["edad"];
                $newProfile->institucion = $userProfile["institucion"];
                $newProfile->curso = $userProfile["grado"];
                $newProfile->apellido = $userProfile["apellido"];
                $newProfile->opciones = 1;
                $newProfile->nombre = $userProfile["nombre"];
                $newProfile->save();
                if( !$newProfile )
                {
                    $response["success"] = false;
                    throw new \Exception('No se creo el perfil');
                }

        });
        //enviar correo con usuario y contraseña si todo salio ok

        $response["survey"]=$transaction;
        if($response["success"]){
            return redirect('instructciones')->with([
            'user'=> $userData
        ] );;
        }else{
            Session::flash('alert-success', 'Por favor Revise los datos ingresados');
            return back()->with('message', 'success| Borrado correctamente.');
        }
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

        //Devolver 2 primeras areas + ocupaciones

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

        //split area
//obtener los onet de cada area
        foreach ($areas as $key => $area) {
            /*
            $categoria = DB::table('cnos')
                ->select('categoria', 'categoria_desc', 'nivel')
                ->where('nivel', $survey->nivel_preparacion)
                ->where('area_id', $area->area)
                ->orderBy( 'nivel', 'asc')
                ->distinct()
                ->get();
            $area->categorias = $categoria;
            $area_arr =  explode(':', $area->desc_area);
            $area->title =  $area_arr[0];
            $area->desc =  $area_arr[1];
            */
            $onet = DB::table('cnos')
                ->select('onet')
                ->where('area_id', $area->area)
                ->orderBy( 'onet', 'asc')
                ->distinct()
                ->get();
            $area->onet = $onet;//TODO cambiar por onet
            $area_arr =  explode(':', $area->desc_area);
            $area->title =  $area_arr[0];
            $area->desc =  $area_arr[1];

        }

       
 
        return view('survey.caracterizacion')->with([
            'survey'=> $survey,
            'results' =>  $areas,
            'nivel' => $survey->nivel_preparacion
        ] );
    }

    public function getResultByAreas(Survey $survey)
    {

        //Devolver 2 primeras areas + ocupaciones

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
            
                ->get();
return $areas;  
        //get survey level

        
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

    public function validateEmail($email){
        $response["success"] = true;

        $user = User::where("email",$email )->get();
        if(!$user->isEmpty()){
            $response["newUser"]= false;
        }else{
            $response["newUser"]= true;
        }
        $response["user"]= $user;
       // $data = $request->json()->all();
        //$email = $data["email"];

        return $response;
    }
}
