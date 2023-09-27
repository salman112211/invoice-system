<?php

namespace App\Http\Controllers;
// use App\Models\UserVerification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
// use App\Http\Requests\RegisterRequest;
use App\Models\User;


class RegisterController extends Controller
{

   
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search query from the request
        
        $query = User::orderBy('created_at', 'desc'); // Base query
    
        if (!empty($search)) {
            // If a search query is provided, filter by name
            $query->where('username', 'like', '%' . $search . '%');
        }
    
        $users = $query->paginate(4); // Paginate the results (adjust as needed)
    
        // Check if any results were found
        $resultsFound = $users->count() > 0;
    
        return view('pages.users', ['users' => $users, 'search' => $search, 'resultsFound' => $resultsFound]);
    }
    


    public function create()
    {
        return view('pages.register');
        
    }
   

    public function store()
    {
        $attributes = request()->validate([
            'username' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'terms' => 'required'
        ]);
        $user = User::create($attributes);
        auth()->login($user);

        return redirect('/dashboard');
    }


    public function edit($id = null){
        if ($id !== null) {
            $users = User::where('id', $id)->first();
            return view('pages.user-edit', compact('users', 'id'));
        } else {
            return redirect('/users');
        }
    }



    public function update(Request $request, $id){
        // Validate the form data
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:5|max:255', // Make 'password' field optional
        ]);
    
        // Retrieve the existing user by its ID
        $user = User::findOrFail($id);
    
        // Update other fields
        $user->username = $request->input('username');
        $user->email = $request->input('email');
    
        // Check if a new password has been provided
        if ($request->has('password') && !empty($request->input('password'))) {
            // Update the 'password' field with the hashed value of the plain text password
            $user->password = bcrypt($request->input('password'));
        }
    
        // Save the updated user
        $user->save();
    
           return redirect('/users')->with('success', 'User verification updated successfully');
    }

    
    
    
    
    
    

    public function delete($id){
        $users = User::whereId($id)->first();
        
        if (!$users) {
            return redirect('/users')->with('error', 'User verification not found.');
        }
    
        $users->delete();
        
        return redirect('/user')->with('success', 'User verification deleted successfully');
    }
}
