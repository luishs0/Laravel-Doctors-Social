<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{


    public function index()
    {
        $messages = Message::where('user_id', auth()->user()->id)->get();

        return view('api.messages.index', compact('messages'));
        
    }


    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => ['required'],
            'email' => ['required', 'email', 'max:150'],
            'text' => ['required'],
            'user_id' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        //save on db
        $message = new Message();
        $message->name = $data['name'];
        $message->email = $data['email'];
        $message->text = $data['text'];
        $message->user_id = $data['user_id'];
        $message->save();

        return response()->json([
            'success' => true
        ]);
    }
}
