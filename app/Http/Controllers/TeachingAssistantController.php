<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Models\CourseClass;
use App\Models\TeachingAssistant;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTeachingAssistantRequest;
use App\Http\Requests\UpdateTeachingAssistantRequest;


class TeachingAssistantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registrations = TeachingAssistant::where('user_id', Auth::id())->get();
        return view('dashboard.student.registration.index', compact('registrations'));
    }

    public function lectureTeachingAssistantIndex(){
       $data = auth()->user()->lecturer_class;

       return view('dashboard.lecturer.teaching-assistant.index', compact('data'));
    }

    public function lectureTeachingAssistantData(CourseClass $course_class){
        return view('dashboard.lecturer.teaching-assistant.data', compact('course_class'));
    }

    public function lectureTeachingAssistantDetail(TeachingAssistant $teaching_assistant){
        return view('dashboard.lecturer.teaching-assistant.detail', compact('teaching_assistant'));
    }

    public function acceptTeachingAssistant(TeachingAssistant $teaching_assistant){
        $teaching_assistant->update([
            'is_accepted' => true,
        ]);

        return back()->with('success','Teaching Assistant Accepted!');
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $courseClasses = CourseClass::where('id', request('id'))->firstOrFail();
        return view('dashboard.student.registration.create', compact('courseClasses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeachingAssistantRequest $request)
    {
        $request->validated();
        $userId = auth()->user()->id;
        $request['user_id'] = $userId;

        $cekIsUserAlreadyRegisteredToThisClass = TeachingAssistant::where('user_id', $userId)
            ->where('class_id', $request['class_id'])
            ->first();

        if ($cekIsUserAlreadyRegisteredToThisClass) {
            return redirect()->back()->with('errors', 'You have already registered this class');
        }

        if ($request->hasFile('recommendation_proof')) {
            $originName = $request->file('recommendation_proof')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('recommendation_proof')->getClientOriginalExtension();
            $fileName = time() . '_' . $fileName . '.' . $extension;

            $request->file('recommendation_proof')->move(public_path('images/recommendation_proofs'), $fileName);
            $recommendation_proof = $fileName;
        }

        DB::beginTransaction();
        try {
            $teachingAssistant = new TeachingAssistant();
            $teachingAssistant->user_id = $request['user_id'];
            $teachingAssistant->class_id = $request['class_id'];
            $teachingAssistant->gpa = $request['gpa'];
            $teachingAssistant->is_available = $request['is_available'];
            $teachingAssistant->lecturer_recommendation_id = $request['lecturer_recommendation_id'];
            $teachingAssistant->recommendation_proof = $recommendation_proof ?? '';
            $teachingAssistant->save();

            DB::commit();
            return redirect(route('student.ta-registration.index'))->with('success', 'Successfully registered');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('errors', $exception->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(TeachingAssistant $teachingAssistant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeachingAssistant $teachingAssistant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeachingAssistantRequest $request, TeachingAssistant $teachingAssistant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeachingAssistant $teachingAssistant)
    {
        //
    }
}
