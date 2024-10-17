<?php

namespace App\Http\Controllers;

use App\Models\CourseClass;
use App\Models\Lecturer;
use App\Models\TeachingAssistant;
use App\Models\TeachingAssistantLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class AcceptLogController extends Controller
{
    public function class()
    {
        $classes = auth()->user()->lecturer_class;
        return view('dashboard.lecturer.log-acceptence.class', compact('classes'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logs = TeachingAssistant::where('class_id', request('id'))->where('is_accepted', 1)->firstOrFail();
        // dd($logs);
        return view('dashboard.lecturer.log-acceptence.index', compact('logs')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $log = TeachingAssistantLog::where('id', $id)->firstOrFail();
        $lecture = Lecturer::where('users_id', Auth::id())->where('class_id',$log->teaching_assistant->class->id )->firstOrFail();
        // dd($lecture);
        $log->update(['is_confirmed' => 1, 'lecture_confirmation_id' => $lecture->id]);

        return redirect(route('lecture.log-acceptance.index', ['id'=>$log->teaching_assistant->class_id] ))->with('success', 'Log accepted successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
