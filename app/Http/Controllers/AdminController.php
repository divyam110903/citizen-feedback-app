<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.feedback.index', compact('feedbacks'));
    }

    public function show(Feedback $feedback)
    {
        return view('admin.feedback.show', compact('feedback'));
    }

    public function update(Request $request, Feedback $feedback)
    {
        $request->validate([
            'status' => 'required|string|in:pending,in_progress,resolved',
            'priority' => 'required|string|in:low,normal,high',
        ]);

        $feedback->update($request->only(['status', 'priority']));

        return redirect()->route('admin.feedback.index')->with('status', 'Feedback updated successfully!');
    }
}