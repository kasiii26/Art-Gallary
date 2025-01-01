<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $all_users = User::all();
        return view('users.users', compact('all_users'));
    }

    public function indexForm()
    {
        return view('add-user');
    }

    public function AddUser(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|string',
            'password' => 'required|confirmed|min:4|max:8',
        ]);

        try {
            $new_user = new User();
            $new_user->name = $request->full_name;
            $new_user->email = $request->email;
            $new_user->phone_number = $request->phone_number;
            $new_user->password = Hash::make($request->password);
            $new_user->role = 0; // Default role
            $new_user->save();

            return redirect()->back()->with('success', 'User added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Failed to add user: ' . $e->getMessage());
        }
    }

    public function indexEditForm($id)
    {
        try {
            $user = User::findOrFail($id);
            return view('edit-user', compact('user'));
        } catch (\Exception $e) {
            return redirect('/users')->with('fail', 'User not found: ' . $e->getMessage());
        }
    }

    public function EditUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $request->user_id,
            'phone_number' => 'nullable|string|max:20',
            'role' => 'nullable|in:0,1',
        ]);

        try {
            $user = User::findOrFail($request->user_id);
            $user->name = $request->full_name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->role = $request->role;
            $user->save();

            return redirect('/users')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Failed to update user: ' . $e->getMessage());
        }
    }

    public function deleteUser($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect('/users')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return redirect('/users')->with('fail', 'Failed to delete user: ' . $e->getMessage());
        }
    }

    public function indexRoleEditForm($id)
    {
        $user = User::findOrFail($id);
        return view('edit-role', compact('user'));
    }

    public function updateRole(Request $request)
    {
        
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|in:0,1',
        ]);
    
        try {
            $user = User::findOrFail($request->user_id);
    
            // Log the user's current data
            \Log::info('User Before Role Update:', $user->toArray());
    
            $user->role = $request->role;
    
            // Explicitly check if save() is successful
            if ($user->save()) {
                \Log::info('Role Updated Successfully:', $user->toArray());
            } else {
                \Log::warning('Role Update Failed:', $user->toArray());
            }
    
            return redirect('/users')->with('success', 'User role updated successfully.');
        } catch (\Exception $e) {
            \Log::error('Update Role Error:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('fail', 'Failed to update role: ' . $e->getMessage());
        }
    }
            }
