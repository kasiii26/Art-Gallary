<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{


    public function index()
    {
        $all_users = User::all();
        return view('users.users', compact('all_users'));
    }
    public function indexForm(){
        return view('add-user');
    }
    public function AddUser(Request $request){
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required',
            'password' => 'required|confirmed|min:4|max:8',
        ]);

        try{
            $new_user = new User;
            $new_user->name = $request->full_name;
            $new_user->email = $request->email;
            $new_user->phone_number = $request->phone_number;
            $new_user->password = Hash::make($request->password);
            $new_user->save();
    
            return redirect('/users')->with('success', 'User Added Successfully');

        } catch (\Exception $e) {
            return redirect('/add/user')->with('Failed', $e->getMessage());
        }

       
    }

    public function EditUser(Request $request){

        dd($request);
        $request->validate([
                'full_name' => 'required|string',
                'email' => 'required|email|unique:users,email,' . $request->user_id,
                'phone_number' => 'required',
                'role' => '',
            
        ]);

        try{
            $update_user = User::where('id', $request->user_id)->update([
              'name' => $request->full_name,
              'email' => $request->email,
              'phone_number' => $request->phone_number,
              'role' => $request->role,
            ]);
    
            return redirect('/users')->with('success', 'User Updated Successfully');

        } catch (\Exception $e) {
            return redirect('/edit/user')->with('fail', $e->getMessage());
        }
       
    }
    

    public function indexEditForm($id){
        $user = User::find($id);

        return view('edit-user',compact('user'));
    }


    public function deleteUser($id){
        try{
            User::where('id', $id)->delete();
            return redirect('/users')->with('success', 'User Deleted Successfully'); 
        }catch (\Exception  $e){
                return redirect('/users')->with('fail',$e->getMessage());
        }
    }


    public function showPost()
    {
        return view('admin.admin-partials.show-post');
    }
    
    public function CreatePost()
    {
        return view('admin.create-post'); // Ensure this view exists
    }

public function StorePost(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'category' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle file upload
    if ($request->hasFile('image')) {
        $filePath = $request->file('image')->store('uploads', 'public');
    }

    // Save post to the database (assuming you have a Post model)
    \App\Models\Post::create([
        'title' => $request->title,
        'description' => $request->description,
        'category' => $request->category,
        'image_path' => $filePath ?? null,
    ]);

    return redirect()->route('admin.create-post')->with('success', 'Post created successfully!');
}



}