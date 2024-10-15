<?php

namespace App\Http\Controllers;

use App\Models\TeachingAssistant;
use App\Http\Requests\StoreTeachingAssistantRequest;
use App\Http\Requests\UpdateTeachingAssistantRequest;

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
        //
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
