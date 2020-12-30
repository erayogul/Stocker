<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use View;






class MainController extends Controller
{

    public function create(Request $request)
    {
        Auth::login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($user));
       $users = User::get();
       return view('employees',compact('users'));
    }
    public function getAllEmployee()
    {
        $users = User::get();
        return view('employees',compact('users'));
    }
    public function EmployeeView($id)
    {
        $user = User::findOrFail($id);
        return view('employeeView',compact('user'));
    }
    public function EmployeeEdit($id)
    {
        $user = User::findOrFail($id);
        return view('EmployeeEdit',compact('user'));
    }
    public function EmployeeUpdate(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user    ->update([
            'name' => $request->name,
            'email' => $request->email, 
            'mobile' => $request->mobile, 
            'address' => $request->address, 
            'date_of_birth' =>$request->date_of_birth, 
            'place_of_birth' => $request->place_of_birth, 
        ]);
    return redirect()->route('employeeEdit',[$request->id]);
    }
}
