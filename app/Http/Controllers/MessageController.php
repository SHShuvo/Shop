<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\TodoList;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        $date = \Carbon\Carbon::today()->subDays(30);
        $data = Message::where('created_at','>=',$date)->orderBy('id', 'desc')->get();
        return response($data, 200);
    }
    
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|max:5000',
        ]);

        $newMessage = Message::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message,
        ]);
        return response($newMessage, 201);
    }
    public function destroy($id){
        Message::find($id)->delete();
    }
}
