<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Batch;
use Auth;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/users';

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function showRegistrationForm()
    {
        $batchs = Batch::orderBy('name')->get();
        return view('auth.register',compact('batchs'));
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role'=>['required'],
            'student_mobile'=>['required'],
            'parent_mobile'=>['required'],
            'batch_id'=>['required'],
        ]);
    }

    protected function create(array $data)
    {
       return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'student_mobile' => $data['student_mobile'],
            'parent_mobile' => $data['parent_mobile'],
            'batch_id' => $data['batch_id'],
        ]);
    }

    //to prevent autologin after register
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath('/users'))->with('success','New User Registered.');
    }
}
