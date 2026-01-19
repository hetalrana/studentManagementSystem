<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class StudentAuthController extends Controller
{
    public function showRegister()
    {
        return view('student.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6|confirmed',
            'mobileno'  => 'required|digits_between:10,15',
            'gender'    => 'required',
            'address'   => 'required',
            'dateofbirth' => 'required|date',
        ]);

        $user = User::create([
            'name' => $request->firstname.' '.$request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $image = null;
        if($request->hasFile('image')){
            $image = $request->image->store('students','public');
        }

        Student::create([
            'user_id'=>$user->id,
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'image'=>$image,
            'gender'=>$request->gender,
            'address'=>$request->address,
            'dateofbirth'=>$request->dateofbirth,
            'mobileno'=>$request->mobileno
        ]);

        Auth::login($user);
        return redirect('/dashboard');
    }

    public function showLogin()
    {
        return view('student.login');
    }

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/dashboard');
        }
        return back()->with('error','Invalid credentials');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

?>