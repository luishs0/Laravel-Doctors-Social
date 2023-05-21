<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedback = Feedback::where('user_id', auth()->user()->id)->get();
        return view('admin.feedback.index', compact('feedback'));
    }

    public function show(Feedback $feedback)
    {
        $id = $feedback->id;
        $review = Feedback::find($id); 
        return view('admin.feedback.show', compact('review'));
    }
}
