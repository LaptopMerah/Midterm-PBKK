<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\CourseClass;
use App\Http\Requests\StoreCourseClassRequest;
use App\Http\Requests\UpdateCourseClassRequest;
use App\Models\TimeShift;

class CourseClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.operator.class.index', [
            'courseClasses' => CourseClass::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = CourseClass::all();
        $academicYears = AcademicYear::all();
        $timeShifts = TimeShift::all();
        return view('dashboard.operator.class.create', compact('courses', 'academicYears', 'timeShifts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseClassRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseClass $courseClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseClass $courseClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseClassRequest $request, CourseClass $courseClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseClass $courseClass)
    {
        //
    }
}
