<?php

namespace App\Http\Controllers\Backend;
use Twilio\Rest\Client;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class BulkSmsController extends Controller
{
    public function sendSms( Request $request )
        {
        // Your Account SID and Auth Token from twilio.com/console
          $sid    = env( 'TWILIO_SID' );
          $token  = env( 'TWILIO_TOKEN' );
          $client = new Client( $sid, $token );

          $validator = Validator::make($request->all(), [
           'id' => 'required',
           'phone' => 'required',
           'message' => 'required'
          ]);

        if ( $validator->passes() ) {
          $number = $request->phone;

         // $numbers_in_arrays = explode( ',' , $request->input( 'numbers' ) );

         $message = $request->input( 'message' );
         $count = 0;

         // foreach( $numbers_in_arrays as $number )
         // {
         //     $count++;

             $client->messages->create(
                 $number,
                 [
                     'from' => env( 'TWILIO_FROM' ),
                     'body' => $message,
                 ]
             );
         // }

         return back()->with( 'success', " messages sent!" );

        } else {
         return back()->withErrors( $validator );
        }
        }
}
