<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;
use Laravel\Socialite\Facades\Socialite;

class AuthManagerController extends Controller
{
    public function login() {
        return view('login');
    }

    public function register() {
        $url = route('register');
        $title = "Registration";
        $user = "";
        $departments = Department::all();
        $data = compact('url', 'title', 'user', 'departments');
        return view('register')->with($data);
    }

    public function checkLogin(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if($request->email == 'admin@upskill.com' && $request->password == 'admin123') {
            session()->put('user_id', 1);
            return redirect(route('company.dashboard'));
        }

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            $id = Auth::user()->id;
            $data = compact('id');
            session()->put('user_id', $id);
            return redirect(route('employee.home'))->with($data);
        }

        return redirect(route('login'))->with('error', 'Login details are not invalid');
    }

    public function registerPost(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['contact'] = $request->contact;
        $data['address'] = $request->address;
        $data['department_id'] = $request->department;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if(!$user) {
            return redirect(route('register'))->with('error', 'Registration Failed, try again');
        }

        return redirect(route('login'));
    }

    public function updateProfile($id) {
        $user = User::find($id);
        $url = url(route('register')) . '/' . $id;
        $title = "Update Profile";
        $departments = Department::all();
        $data = compact('url', 'title', 'user', 'departments');
        return view('register')->with($data);
    }

    public function updateProfilePost(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'address' => 'required'
        ]);

        $user = User::find($id);
        if(!is_null($user)) {
            $user['name'] = $request->name;
            $user['email'] = $request->email;
            $user['contact'] = $request->contact;
            $user['address'] = $request->address;
            $user['department_id'] = $request->department;
            $user->save();
        } else {
            return redirect(route('register'))->with('error', 'Updation Failed, try again');
        }

        return redirect(route('employee.home'))->with('success', 'Your profile has been updated');
    }


    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

    //Google Login
    public function redirectToGoogle(){
        return Socialite::driver('google')->stateless()->redirect();
    }
    
    //Google callback
    public function handleGoogleCallback(){
    
        $user = Socialite::driver('google')->stateless()->user();
        $findUser = User::where('email', $user->email)->get()->toArray();
        $data = new User;
        $credentials = [];
        if(empty($findUser)) {
            $credentials['email'] = $user->email;
            $credentials['password'] = Hash::make('gitub@login');
            $data['name'] = $user->nickname;
            $data['email'] = $user->email;
            $data['password'] = Hash::make('gitub@login');
            $data->save();
        } else {
            $credentials['email'] = $findUser[0]['email'];
            $credentials['password'] = "gitub@login";
        }
        
        if(Auth::attempt($credentials)) {
            $id = Auth::user()->id;
            $data = compact('id');
            return redirect()->route('employee.home')->with($data);
        }
        return redirect(route('login'));
    }
    
    //Facebook Login
    public function redirectToFacebook(){
        return Socialite::driver('facebook')->stateless()->redirect();
    }
    
    //facebook callback
    public function handleFacebookCallback(){
        $user = Socialite::driver('facebook')->stateless()->user();
        return redirect()->route('employee.home');
    }
    
    //Github Login
    public function redirectToGithub(){
        return Socialite::driver('github')->stateless()->redirect();
    }
    
    //github callback
    public function handleGithubCallback(){
        $user = Socialite::driver('github')->stateless()->user();
        $findUser = User::where('email', $user->email)->get()->toArray();
        $data = new User;
        $credentials = [];
        if(empty($findUser)) {
            $credentials['email'] = $user->email;
            $credentials['password'] = Hash::make('gitub@login');
            $data['name'] = $user->nickname;
            $data['email'] = $user->email;
            $data['password'] = Hash::make('gitub@login');
            $data->save();
        } else {
            $credentials['email'] = $findUser[0]['email'];
            $credentials['password'] = "gitub@login";
        }
        
        if(Auth::attempt($credentials)) {
            $id = Auth::user()->id;
            $data = compact('id');
            return redirect()->route('employee.home')->with($data);
        }
        return redirect(route('login'));
    }
}
