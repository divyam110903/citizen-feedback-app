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

    public function update(Request $request, $id)
{
    $request->validate([
        'status' => 'required|string',
        'priority' => 'required|string',
    ]);

    $feedback = Feedback::findOrFail($id);
    $feedback->status = $request->status;
    $feedback->priority = $request->priority;
    $feedback->save();

    return redirect()->route('admin.feedback.index')->with('status', 'Feedback updated successfully!');
}
}