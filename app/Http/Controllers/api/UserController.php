<?php


namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class UserController extends Controller
{



    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'LOGIN_ID';
    }


    protected function attemptLogin(Request $request)
    {
//        $output= $request->loginId;
//
//        echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
        $user = User::where([
            'LOGIN_ID' => $request->LOGIN_ID,
            'PASSWORD' => md5($request->password)
        ])->first();

        if ($user) {
            if (!$user->update_bPassword) {

                $user->bPassword = bcrypt($request->password);
                $user->update_bPassword = 1;
                $user->save();
            }

            $this->guard()->login($user, $request->has('remember'));

            return true;
        }

        return false;
    }

}
