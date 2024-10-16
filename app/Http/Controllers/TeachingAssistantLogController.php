<?php

namespace App\Http\Controllers;

use App\Models\CourseClass;
use App\Models\TeachingAssistant;
use App\Models\TeachingAssistantLog;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTeachingAssistantLogRequest;
use App\Http\Requests\UpdateTeachingAssistantLogRequest;

class TeachingAssistantLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $logs = TeachingAssistant::where('is_accepted', 1)->where('user_id', Auth::id())->get();
        return view('dashboard.student.log.index', compact('logs'));
    }

    public function data(TeachingAssistant $teaching_assistant)
    {   
        $title = 'Delete Log';
        $text = 'Do you want really to delete this log?';
        confirmDelete($title, $text);
        return view('dashboard.student.log.data', compact('teaching_assistant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        // Fetch the course class by ID passed in the route
        $courseClasses = CourseClass::where('id', $id)->firstOrFail();
        
        // Pass the courseClasses to the view
        return view('dashboard.student.log.create', compact('courseClasses'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeachingAssistantLogRequest $request)
    {
        $request->validated();
        TeachingAssistantLog::create($request->all());
        $teachingassistant = TeachingAssistant::where('id', $request->teaching_assistant_id)->firstOrFail();
        return redirect()->route('student.ta-log.data',$teachingassistant)->with('success', 'Log created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(TeachingAssistantLog $teachingAssistantLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeachingAssistantLog $teachingAssistantLog)
    {
        // $courseClasses = CourseClass::where('id', $id)->firstOrFail();
        return view('dashboard.student.log.edit', compact('teachingAssistantLog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeachingAssistantLogRequest $request, TeachingAssistantLog $teachingAssistantLog)
    {
        $request->validated();
        $teachingAssistantLog->update($request->all());
        return redirect()->route('student.ta-log.data',$teachingAssistantLog->teaching_assistant->id)->with('success', 'Log updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeachingAssistantLog $teachingAssistantLog)
    {
        $teachingAssistantLog->delete();
        return redirect()->route('student.ta-log.data',$teachingAssistantLog->teaching_assistant->id)->with('success', 'Log deleted successfully');
    }
}
