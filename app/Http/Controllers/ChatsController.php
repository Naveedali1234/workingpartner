<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use App\ConversationList;
use App\Events\PrivateMessageSent;
use App\Thread;
use Illuminate\Support\Facades\DB;
use Storage;
class ChatsController extends Controller
{
    public function index(){
    	if(auth()->user()->role=='working_partner'){
    	   return view('working-partner-dashboard.chats');
        }
        if(auth()->user()->role=='seller'){
            return view('seller-dashboard.chats');
        }
    }
    public function sendFirstMessage(Request $request){
        $exists = auth()->user()->threads->contains(auth()->id().$request->reciever_id);
        if(!$exists){
          $thread = Thread::create([
            'id' => auth()->id().$request->reciever_id,
          ]);
          auth()->user()->messages()->create([
            'thread_id' => $thread->id,
            'message' => $request->message,
            'status' => 0,
            ]);
            $thread->users()->attach([auth()->id(),$request->reciever_id]);  
        }
        else
        {
            auth()->user()->messages()->create([
                'thread_id' => auth()->id().$request->reciever_id,
                'message' => $request->message,
                'status' => 0,
                ]);
        }
    	// $conversationList = auth()->user()->conversation_lists()->firstOrCreate([
     //        'owner_id' => $request->reciever_id,
     //        'owner_name' => $request->reciever_name,
     //    ]);
        return back()->with('success','Your message has been sent');
    }
    public function conversationList(){
        $thread_ids = [];
        // fetch all the threads of the logged in user
        $threads = auth()->user()->threads()->select('thread_id')->wherePivot('user_id','=',auth()->id())->get();
        foreach ($threads as $thread) {
            $thread_ids[] = $thread->thread_id;
        }

        //fetch all the threads and users who is associated with the logged in user
        $threadsAndUsers = DB::table('thread_user')
        ->select('thread_user.user_id','thread_user.thread_id','users.title','users.name','users.email','users.mobile',DB::raw('(select message from messages where messages.thread_id=thread_user.thread_id order by id desc limit 1) as last_message'))
        // ->select('users.id','thread_user.user_id',DB::raw('(select message from messages where messages.thread_id=thread_user.thread_id order by id desc limit 1) as last_message'))
        ->join('users','users.id','=','thread_user.user_id')
        // ->leftjoin('messages','thread_user.thread_id','=','messages.thread_id')
        ->whereIn('thread_user.thread_id',$thread_ids)
        ->where('thread_user.user_id','!=',auth()->id())->get();
         
         // fetch thread from the array of fetched thread ids and count all the messages whose status is 0 who is associated with the logged in user but do not fetch logged in user record 
        $messagelist = Message::select('thread_id',DB::raw('count(id) as messages'))->whereIn('thread_id',$thread_ids)->where('user_id','!=',auth()->id())->where('status',0)->pluck('messages','thread_id');
// dd($threadsAndUsers);
        // concatenate the messages column with threads and their associated user
        foreach($threadsAndUsers as $key=>$value){
            if(isset($messagelist[$value->thread_id])){

            $threadsAndUsers[$key]->messages=$messagelist[$value->thread_id];

        }else{
            $threadsAndUsers[$key]->messages=0;

        }
        
        }
        // dd($threadsAndUsers);
        
        return $threadsAndUsers;
        
    }
    public function privateMessages(User $user,Thread $thread){
        
            Message::
            where('thread_id','=',$thread->id)->where('user_id','=',$user->id)
        ->update(['status'=> 1]);
    	$privateCommunication= Message::with('user')
        ->where(['user_id'=> $user->id, 'thread_id'=> $thread->id])
        ->orWhere(function($query) use($thread){
            $query->where(['user_id' => auth()->id(), 'thread_id' => $thread->id]);
        })
        ->get();
        
        return $privateCommunication;
    }
    public function sendPrivateMessage(Request $request,User $user,Thread $thread)
    {
            $input=$request->all();
            $input['thread_id']=$thread->id;
            $input['status'] = 0;
            if(request()->has('file')){
            $fileName = time().request('file')->getClientOriginalName();
            Storage::put('public/'.$fileName,file_get_contents(request('file')));
            // $filename = request('file')->store('chat');
            $message=Message::create([
                'user_id' => auth()->user()->id,
                'image' => $fileName,
                'thread_id' => $thread->id,
                'status' => 0,
            ]);
        }
        else{
            // $input['reciever_name'] = $user->name;
            $message=auth()->user()->messages()->create($input);
        }
        	broadcast(new PrivateMessageSent($message->load('user'),$user->id))->toOthers();
        
        return response(['status'=>'Message private sent successfully','message'=>$message]);
    }
}
