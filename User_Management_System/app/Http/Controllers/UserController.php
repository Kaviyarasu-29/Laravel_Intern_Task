<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function create()
    {
        return view('Users.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nickname' => 'required|string|max:6',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|numeric|unique:users',
            'password' => 'required|string|min:4',
            'dob' => 'required|date',
            'age' => 'required|integer|min:10',
            'gender' => 'required|in:Male,Female,Other',
            // 'job' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        if ($request->has('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            // $path = 'uploads/profile';


            // $path = Storage::disk('profile')->putFileAs('', $file, $filename);
            // dd($filename);
            // $validatedData['image'] = $path;


            $path = 'uploads/images';
            $file->move(($path), $filename);
            $validatedData['image'] = $path . '/' . $filename;
        }

        // $validatedData['password'] = Hash::make($validatedData['password']);


        User::create($validatedData);

        return redirect()->route('users.create')->with('Message', 'User created successfully!');
    }

    // List users
    public function index(Request $request)
    {
        $sortField = $request->input('sort', 'name');
        $sortDirection = $request->input('direction', 'asc');
        $users = User::orderBy($sortField, $sortDirection)->get();
        // $users = User::all();
        return view('Users.index', compact('users', 'sortField', 'sortDirection'));
    }

    // Complete user details
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('Users.show', compact('user'));
    }


    public function update(Request $request, $id)
    {
        // dd($request->all(), $id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'nickname' => 'required|string|max:6',
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile' => 'required|numeric|unique:users,mobile,' . $id,
            'dob' => 'required|date',
            'age' => 'required|integer|min:10',

            'gender' => 'required|in:Male,Female,Other',
            'address' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        // check if val fails
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // find user
        $user = User::findOrFail($id);

        // old image path
        $old_image = $user->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/images';
            $file->move($path, $filename);
            $newImagePath = $path . '/' . $filename;

            // Update image path in the database
            $user->image = $newImagePath;
        }
        // dd($user->image);
        $user->update($request->except('image'));
        if (isset($newImagePath)) {

            // delete old image
            if ($user->image && file_exists($user->image)) {
                if (file_exists($old_image)) {
                    unlink($old_image);
                }
                // else {
                //     return  redirect()->route('users.show', $id)->with('Message', 'Old image not found!');
                // }
            }

            $user->save();
        }




        // $user->update($request->all());
       
        return redirect()->back()->with('Message', 'User details updated successfully!');
        // return redirect()->route('users.show', $id)->with('Message', 'User details updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $old_image = $user->image;
        if ($old_image && file_exists($old_image)) {
            unlink($old_image);
            // echo 'image deleted';
            // exit;
        }
        // else {
        //     // echo 'false';
        //     // exit;
        // }

        $user->delete();

        return redirect()->route('users.index')->with('Message', 'User deleted successfully!');
    }

    public function profile()
    {
        return view('Users.profile');
    }
}
