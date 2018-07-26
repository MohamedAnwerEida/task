<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'hobbies' => 'required|string',
            'gender' => 'required|string|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function send_welcom($id_user)
    {
        $results = User::where('id', $id_user)->select('id', 'name', 'idcode', 'email')->first();
        $id = $results->id;
        $name = $results->name;
        $email = $results->email;
        $idcode = $results->idcode;
        $jop = (new \App\Jobs\SendMailJob($id, $name, $email,$idcode))->
        delay( \Carbon\Carbon::now()->addSeconds(5));
        dispatch($jop);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'hobbies' => $data['hobbies'],
            'gender' => $data['gender'],
            'idcode' => rand(1000, 9999),
        ]);
        $this->send_welcom($user->id);
        return $user;
    }
}
