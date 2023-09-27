<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\UserVerification;

class VerificationController extends Controller
{
    public function index(){
        // $verification= Verification::all();
        // return view('pages.add-user');
    }

    
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the form data
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:user_verifications,email',
        //     'phone' => 'required|string|max:255',
        //     'verification' => 'required|string|max:255',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);
    
        // Handle image upload and storage
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('uploads'); // Adjust the storage path as needed
        // } else {
        //     $imagePath = null; // No image was uploaded
        // }
    
        // Create a new UserVerification record in the database
        // UserVerification::create([
        //     'name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'phone' => $request->input('phone'),
        //     'verification' => $request->input('verification'),
        //     'image_path' => $imagePath, // Store the image path in the database
        // ]);
    
        // Optionally, redirect to a success page or return a response
    }



}
