<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function store (Request $request) 
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'vote' => ['required'],
            'review' => ['required'],
            'reviewer_name' => ['required'],
            'user_id' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $feedback = new Feedback();
        $feedback->vote = $data['vote'];
        $feedback->review = $data['review'];
        $feedback->reviewer_name = $data['reviewer_name'];
        $feedback->user_id = $data['user_id'];
        $feedback->save();

        return response()->json([
            'success' => true
        ]);
    }
}
