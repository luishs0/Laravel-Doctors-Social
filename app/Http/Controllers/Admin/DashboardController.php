<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $messages = Message::where('user_id', Auth::user()->id)->count('id');
        $feedbacks = Feedback::where('user_id', Auth::user()->id)->count('id');
        $votes = Feedback::where('user_id', Auth::user()->id)->get();
        $avgVote = $votes->avg('vote');
        return view('Admin.dashboard', compact('messages', 'feedbacks', 'avgVote'));
    }
}
