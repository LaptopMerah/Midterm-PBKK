<?php

namespace App\Http\Controllers;

use App\Models\TeachingAssistant;
use App\Http\Requests\StoreTeachingAssistantRequest;
use App\Http\Requests\UpdateTeachingAssistantRequest;
use Illuminate\Support\Facades\DB;

class TeachingAssistantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.pendaftaran.index');
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
    public function store(StoreTeachingAssistantRequest $request)
    {
        $request->validated();
        $userId = auth()->user()->id;
        $request['user_id'] = $userId;

        $cekIsUserAlreadyRegisteredToThisClass = TeachingAssistant::where('user_id', $userId)->andWhere('class_id',$request['class_id'])->first();

        if($cekIsUserAlreadyRegisteredToThisClass) {
            return redirect()->back()->with('errors', 'You have already registered this classs');
        }

        if ($request->hasFile('recommendation_proof')) {
            $file = $request->file('recommendation_proof');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/recommendation_proofs'), $fileName);
            $request['recommendation_proof'] = $fileName;
        }

        DB::beginTransaction();
        try {
        $teachingAssistant = new TeachingAssistant();

        $teachingAssistant->fill($request->all());

        $teachingAssistant->save();
        DB::commit();
        return redirect(route('student.ta.index'))->with('success', 'Successfully registered');
        }catch (\Exception $exception){
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
