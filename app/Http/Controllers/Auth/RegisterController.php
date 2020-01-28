<?php

namespace AutoKit\Http\Controllers\Auth;

use AutoKit\Components\Cart\Cart;
use AutoKit\Mail\UserRegistered;
use AutoKit\User;
use AutoKit\Http\Controllers\Controller;
use AutoKit\Vinrequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Lang;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    protected $request;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request, Cart $cart)
    {
        $this->request = $request;
        $this->middleware('guest');
        $this->cart = $cart;
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
            'name' => 'required|string|max:255|min:2',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \AutoKit\User
     */
    protected function create( array $data)
    {
        return  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => bcrypt($data['password']),
            'confirm_token' => str_random(32)
        ]);
    }

    public function checkEmail(Request $request)
    {
        $hasUser = !!User::whereEmail($request->email)->first();
        return response()->json([
            'hasUser' => $hasUser,
            'message' => $hasUser ? Lang::get('validation.unique', ['attribute' => 'email']) : ''
        ]);
    }
}
