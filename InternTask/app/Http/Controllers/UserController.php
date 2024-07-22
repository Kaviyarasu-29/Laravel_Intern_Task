<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function Home()
    {
        return view('User/userHome');
    }
    public function addUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|numeric|unique:users',
            'password' => 'required|string|min:5',
            'dob' => 'required|date',
            'age' => 'required|integer|min:10',
            'gender' => 'required|in:Male,Female,Other',
            'job' => 'nullable|string|max:255',
        ]);

        // $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('userList')->with('Message', 'User registered successfully!');
    }

    // List users
    public function listUser()
    {
        $users = User::all();
        return view('User/User-Details', compact('users'));
    }

    // Complete user details
    public function CompleteDetails($id)
    {
        $user = User::findOrFail($id);
        return view('User/CompleteDetails', compact('user'));
    }


    public function updateUser(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile' => 'required|numeric|unique:users,mobile,' . $id,
            'dob' => 'required|date',
            'age' => 'required|integer|min:10',
            // 'gender' => 'required|in:Male,Female,Other',
            'job' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput(); // Redirect with errors
        }

        $user = User::findOrFail($id);
        $user->update($request->all()); // Update user data

        return redirect()->route('userDetails', $id)->with('Message', 'User details updated successfully!');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('userList')->with('Message', 'User deleted successfully!');
    }
}
