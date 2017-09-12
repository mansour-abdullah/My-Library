<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Socialite;
use Auth;
use Exception;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
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
        $this->middleware('guest', ['except' => 'logout']);
    }


public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
          try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
          echo $e;
        }
 
        $authUser = $this->findOrCreateUser($user, $provider);
 
        auth()->login($authUser, true);
 
        return redirect()->to('/');
      
    }


       private function findOrCreateUser($socialLiteUser, $key)
    {
 
        $user = User::updateOrCreate([
            'email' => $socialLiteUser->email,
            
        ], [
            $key . '_id' => $socialLiteUser->id,
            'name' => $socialLiteUser->name
        ]);
 
 
        return $user;
    }  
    
}
