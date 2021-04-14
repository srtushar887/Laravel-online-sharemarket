<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

class UserMessageController extends Controller
{
    public function message()
    {
        $users = User::where('id','!=',Auth::user()->id)->get();
        return view('user.message.message',compact('users'));
    }

    public function message_get($id)
    {
        $user_id = $id;
        $my_id = Auth::user()->id;

        $messages = message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from',$my_id)->where('to',$user_id);
        })->orWhere(function ($query) use ($user_id,$my_id){
            $query->where('from',$user_id)->where('to',$my_id);
        })->get();



        return view('user.message.chat',['messages' => $messages,'user_id'=>$user_id]);
    }


    public function message_send(Request $request)
    {
        $from = Auth::user()->id;
        $to = $request->receiver_id;
        $message = $request->message;

        $data = new message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0;
        $data->save();

        $options = array(
            'cluster' => 'ap4',
            'useTLS' => true
        );


        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);


    }
}
