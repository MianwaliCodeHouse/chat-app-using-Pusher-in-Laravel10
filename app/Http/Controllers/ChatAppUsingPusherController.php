<?php

namespace App\Http\Controllers;

use App\Events\message;
use Illuminate\Http\Request;

class ChatAppUsingPusherController extends Controller
{
    public function fire_event(Request $request){
        $request->validate(
            [
                'username'=>'required',
                'message'=>'required'
            ]
            );
        event(new message($request->username,$request->message));
    }
    public function notFound(){
        abort('404','Not Found');
    }
    public function chatroom(Request $request){
        $request->validate(
            [
                'username'=>'required'
            ]
            );
            $username=$request->username;
       return view('chat')->with(['username'=>$username]);
    }
}
