<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'identifier_number' => 'required|numeric|min_digits:10|max_digits:20|unique:users,identifier_number',
            'phone_number'=>'required|numeric|min_digits:10|max_digits:15|unique:users,phone_number',
            'password' => 'required|min:8|string',
            'user_type' => ['required',Rule::enum(UserType::class)]
        ]);

        $validated['password'] = bcrypt($validated['password']);

        DB::beginTransaction();
        try {
            $user = new User();
            $user->fill($validated);
            $user->save();
            DB::commit();

            return redirect(route('operator.user-management.index'))->with('success', 'User created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('errors', $e->getMessage());
        }

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
