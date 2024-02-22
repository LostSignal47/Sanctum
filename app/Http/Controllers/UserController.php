<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
        
            // ตรวจสอบข้อมูลที่ส่งมา Login : email, password, device_name
             $request->validate([
                 'email' => 'required|email',
                 'password' => 'required',
                 'device_name' => 'required',
             ]);
      
             // ค้นหา user ในฐานข้อมูล
             $user = User::where('email', $request->email)->first();
          
             // ตรวจสอบ ถ้าไม่มี user ให้แจ้ง
             if (! $user || ! Hash::check($request->password, $user->password)) {
                 throw ValidationException::withMessages([
                     'email' => ['The provided credentials are incorrect.'],
                 ]);
             }
             // สร้าง Token และเก็บไว้ในฐานข้อมูลและเข้ารหัส Hash Token 
             return $user->createToken($request->device_name)->plainTextToken;
    
        
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        return $user->tokens()->delete();
    }
}
