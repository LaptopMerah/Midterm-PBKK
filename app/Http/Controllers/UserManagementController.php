<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $datum = User::filter(request(['search']))->latest()->paginate(10)->withQueryString();
        $title = 'Delete User';
        $text = "Do you really want to delete this user from application?";
        confirmDelete($title, $text);
        return view('dashboard.operator.user.index', compact('datum'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $userType = UserType::getValues();
        return view('dashboard.operator.user.create', compact('userType'));
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
        $user = User::where('id', $id)->firstOrFail();

        $userType = UserType::getValues();
        return view('dashboard.operator.user.edit', compact('user', 'userType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = User::where('id', $id)->firstOrFail();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$data->id,
            'identifier_number' => 'required|numeric|min_digits:10|max_digits:20|unique:users,identifier_number,'.$data->id,
            'phone_number'=>'required|numeric|min_digits:10|max_digits:15|unique:users,phone_number,'.$data->id,
            'user_type' => ['required',Rule::enum(UserType::class)]
        ]);

        if ($request->filled('password')||$request->password!=null) {
            $validated= $request->validate([
                'password' => ['required','string',Password::min(8)->numbers()],
            ]);
            $validated['password'] = bcrypt($request->password);
        }

        DB::beginTransaction();
        try {
            $data->update($validated);
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('errors', $e->getMessage())->withInput();
        }
        return redirect(route('operator.user-management.index'))->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->firstOrFail();

        $user->delete();

        return redirect(route('operator.user-management.index'))->with('success', 'User deleted successfully');
    }
}
