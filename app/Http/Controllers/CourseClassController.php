<?php

namespace App\Http\Controllers;

use App\Enums\DayType;
use App\Enums\UserType;
use App\Http\Requests\StoreCourseClassRequest;
use App\Http\Requests\UpdateCourseClassRequest;
use App\Models\AcademicYear;
use App\Models\Course;
use App\Models\CourseClass;
use App\Models\TimeShift;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Course Class';
        $text = "Do you really want to delete this course class?";
        confirmDelete($title, $text);
        return view('dashboard.operator.class.index', [
            'courseClasses' => CourseClass::latest()->paginate(10)
        ]);
    }

    public function addLecture()
    {
        return view('dashboard.operator.class.addLecture', [
            'users' => User::where('user_type', UserType::LECTURER)->get(),
            'classes' => CourseClass::all()
        ]);
    }

    public function editLecture(CourseClass $course_class)
    {
        return view('dashboard.operator.class.editLecture', [
            'courseClass' => $course_class,
            'users' => User::where('user_type', UserType::LECTURER)->get()
        ]);
    }

    public function updateLecturer(Request $request, CourseClass $course_class)
    {
        $request->validate([
            'user_id' => 'required|array',
            'user_id.*' => 'required|exists:users,id',
        ]);

        DB::beginTransaction();
        try {
            $course_class->lecturer_user()->sync($request['user_id']);
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
        return redirect()->route('operator.class.index')->with('success', 'Lecturer has been updated.');
    }

    public function storeLecture(Request $request)
    {
        $request->validate([
            'class_id' => 'required|integer|exists:course_classes,id',
            'user_id' => 'required|array',
            'user_id.*' => 'required|integer|exists:users,id',
        ]);

        $class = CourseClass::where('id', $request['class_id'])->firstOrFail();

        DB::beginTransaction();
        try {
            $class->lecturer_user()->attach($request['user_id']);
            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return redirect()->route('operator.class.index')->with('success', 'Lecture added successfully.');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        $academicYears = AcademicYear::all();
        $timeShifts = TimeShift::all();
        $dayData = DayType::getValues();
        return view('dashboard.operator.class.create', compact('courses', 'academicYears', 'timeShifts', 'dayData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseClassRequest $request)
    {
        $request->validated();

        $checkUniqueConstraint = CourseClass::where('course_id', $request['course_id'])->where('class_code', $request['class_code'])->where('academic_year_id', $request['academic_year_id'])->first();

        if ($checkUniqueConstraint) {
            return back()->with('toast_error', 'Class Already Exist!');
        }

        DB::beginTransaction();
        try {
            $courseClass = new CourseClass();
            $courseClass->class_code = $request['class_code'];
            $courseClass->day = $request['day'];
            $courseClass->class_participant = $request['class_participants'];
            $courseClass->semester = $request['semester'];
            $courseClass->course_id = $request['course_id'];
            $courseClass->academic_year_id = $request['academic_year_id'];
            $courseClass->time_shift_id = $request['time_shift_id'];

            $courseClass->save();

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
        return redirect()->route('operator.class.index')->with('success', 'Berhasil Menambahkan Data');
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
    public function edit(int $id)
    {
        $courseClass = CourseClass::where('id', $id)->with(['lecturer_user', 'course'])->firstOrFail();

        $courses = Course::all();
        $academicYears = AcademicYear::all();
        $timeShifts = TimeShift::all();
        $dayData = DayType::getValues();
        return view('dashboard.operator.class.edit', compact('courseClass', 'courses', 'academicYears', 'timeShifts', 'dayData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseClassRequest $request, CourseClass $class)
    {
        $request->validated();
        $request['class_participants'] = $request['class_participant'];

        DB::beginTransaction();
        try {
            $class->update($request->all());
            DB::commit();
            return redirect()->route('operator.class.index')->with('success', 'Berhasil Memperbarui Data');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseClass $class)
    {
        $class->delete();
        return redirect()->route('operator.class.index')->with('success', 'Berhasil Menghapus Data');
    }
}
