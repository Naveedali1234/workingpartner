<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
class AdminConversationController extends Controller
{
    public function allConversationList(){
    	$threads = Thread::with('users')->get();
    	return view('admin-dashboard.conversation-management.all-conversation-list',compact('threads'));
    }
    public function conversationDetails(Thread $thread){
    	return view('admin-dashboard.conversation-management.user-conversation',compact('thread'));
    }
}
