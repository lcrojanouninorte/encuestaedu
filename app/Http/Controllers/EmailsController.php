<?php

namespace App\Http\Controllers;
use Mail;

use Illuminate\Http\Request;
use Response;

class EmailsController extends Controller
{
    //
    public function register(Request $request){


         $data =array(
            'verificationCode'=>$request->verificationCode,
            'password'=> $request->password,
            'email'=>$request->email
        );
        $user = $request->user;
       

      $send =   Mail::send('emails.userverification', $data, function ($m) use ($user) {
            $m->from('obsriomagdalena@uninorte.edu.co', 'Observatorio del Río Magdalena ');
            $m->to($user["email"])->subject('Confirmación de Registro en Plataforma OBS');
        });
        return response()->json($send, 200);
      
    }

    public function reset(Request $request){

        $email = $request->email;
        $token = $request->token;

           Mail::send('emails.reset_link', compact('email', 'token'), function ($mail) use ($email) {
            $mail->to($email)
            ->from('obsriomagdalena@uninorte.edu.co')
            ->subject('Password reset link');
        });

        return $request;

    }
}
