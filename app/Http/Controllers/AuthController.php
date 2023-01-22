<?php

namespace App\Http\Controllers;

use App\Log;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function log($message) {
        Log::create([
            'user_id' => auth()->id(),
            'message' => $message,
        ]);
    }
    public function register (Request $request) {
        return view('register');
    }

    public function registerPost(Request $request) {
        $data = $request->validate([
            'email' => ['email', 'required', 'unique:users,email'],
            'password' => ['required'],
            'name' => ['required'],
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        auth()->login($user);

        $this->log('has registered.');

        return redirect()->to('/home');
    }

    public function login (Request $request) {
        $data = $request->validate([
            'email' => ['required', 'exists:users,email'],
            'password' => ['required']
        ]);

        $user = User::where('email', $data['email'])->first();


        if (Hash::check($data['password'], $user->password)) {
            auth()->login($user);

            $this->log('has login.');

            return redirect()->to('/home');
        }

        alert()->warning('Wrong credentials!');

        return back();
    }

    public function changePassword(Request $request) {
        $request->validate(['password' => 'required']);

        $newPassword = bcrypt($request->password);

        auth()->user()->update(['password' => $newPassword]);

        alert()->success('new password has been saved!');

        return back();
    }
}
