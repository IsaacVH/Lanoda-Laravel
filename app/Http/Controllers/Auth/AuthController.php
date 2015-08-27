<?php

namespace Lanoda\Http\Controllers\Auth;

use Lanoda\User;
use Auth;
use Validator;
use Lanoda\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Handle an authentication attempt.
     *
     * @return void
     */
    public function getLogin() {
        return view('auth.login');
    }

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function postLogin(Request $request) {
        return $this->authenticate($request->input('email'), $request->input('password'));
    }

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function getRegister() {
        return view('auth.register');
    }

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function postRegister(Request $request) {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $password = $request->input('password');

        $exists = User::where('email', $email)->get()->toArray();
        if(sizeof($exists) > 0) {
            return redirect('/auth/login')->with(['error' => 'Email already registered!']);
        }

        $user_data = array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => $password
        );

        $user = $this->createUser($user_data);
        return $this->authenticate($user['email'], $user['password']);
    }

    /**
     * Authenticate a user
     *
     * @param  string  $email
     * @param  string  $password
     * @return redirect
     */
    protected function authenticate($email, $password)
    {
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended('/contacts');
        }

        return redirect('/auth/login')->with(['error' => 'User not found.']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:355|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function createUser(array $data)
    {
        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
