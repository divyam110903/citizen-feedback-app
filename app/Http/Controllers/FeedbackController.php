<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::where('user_id', Auth::id())->get();
        return view('feedback.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('feedback.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('feedback_images', 'public') : null;

        Feedback::create([
            'user_id' => Auth::id(),
            'category' => $request->category,
            'description' => $request->description,
            'location' => $request->location,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('feedback.index')->with('status', 'Feedback submitted successfully!');
    }
}