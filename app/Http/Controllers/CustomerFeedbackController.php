<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerFeedback;


class CustomerFeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = CustomerFeedback::all();
        return view('feedbacks.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('chitiet.chitiet');
    }

    public function store(Request $request)
    {
        
        $user_id = auth()->user()->user_id; // Lấy user_id từ user đã đăng nhập
        $feedback_content = $request->message; // Lấy nội dung feedback từ trường message trong request
        $feedback_time = now();
        
        CustomerFeedback::create([
            'user_id' => $user_id,
            'feedback_content' => $feedback_content,
            'feedback_time' => $feedback_time,
        ]);
    
        return redirect()->route('chitiet.chitiet')->with('success', 'Feedback created successfully.');
    }
}