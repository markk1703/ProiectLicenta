<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\SocialProvider;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Login username to be used by the controller.
     *
     * @var string
     */
    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->username = $this->findUsername();
    }

    
    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function findUsername()
    {
        $login = request()->input('username');
 
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
 
        request()->merge([$fieldType => $login]);
 
        return $fieldType;
    }
    /**
     * Get username property.
     *
     * @return string
     */
    public function username()
    {
        return $this->username;
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try{
            $socialUser = Socialite::driver($provider)->user();
        }catch(\Exception $e)
        {
            return redirect('/');
        }
        //verifica daca s-a logat anterior
        $socialProvider=SocialProvider::where('provider_id',$socialUser->getId())->first();
        if(!$socialProvider)
        {
            //creeaza un user nou
            switch($provider){
                case 'facebook':
            $name=$socialUser['name'];
            $splitName=explode(' ', $name, 2);
            $first_name = $splitName[0];
            $last_name = !empty($splitName[1]) ? $splitName[1] : '';
            $user=User::firstOrCreate(
                ['email'=>$socialUser->getEmail()],
                ['nume'=>$last_name,'prenume'=>$first_name]
            );
                break;

                case 'google':
                $user=User::firstOrCreate(
                    ['email'=>$socialUser->getEmail()],
                    ['nume'=>$socialUser->user['family_name'],'prenume'=>$socialUser->user['given_name']]
                );
                break;
            }

            $user->socialProviders()->create(
                ['provider_id'=>$socialUser->getId(),'provider'=>$provider]
            );
 
        }
        else $user=$socialProvider->user;

        Auth::login($user);
        return redirect('/home');
    }
}
