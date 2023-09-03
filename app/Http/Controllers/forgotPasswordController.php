<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class forgotPasswordController extends Controller
{
    public function index()
    {
        return view('forgot-password');
    }

    public function forgotPasswordEmail(Request $request)
    {
        $request->validate([
            'email' => "required|email|exists:users",
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request['email'],
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('reset-email', ["token" => $token], function($message) use ($request){
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        return redirect()->to(route('forgot-password'))->with("success", "We have send an email to reset password");
    }

    public function resetPassword($token)
    {
        return view('new-password', compact('token'));
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => "required|email|exists:users",
            'password' => "required|min:6|confirmed",
            "password_confirmation" => "required"
        ]);

        $updatePassword = DB::table("password_reset_tokens")
            ->where([
                "email" => $request->email,
                "token" => $request->token
            ])->first();

        if(!$updatePassword)
        {
            return redirect()->to(route('new-password'))->with("error", "Invalid");
        }

        User::where(["email" => $request->email])
            ->update(["password" => Hash::make($request->password)]);

        DB::table("password_reset_tokens")->where(["email" => $request->email])->delete();

        return redirect()->to(route('login'))->with("success", "Password has been reset");
    }
}
