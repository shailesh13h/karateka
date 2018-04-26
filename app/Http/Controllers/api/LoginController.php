<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Auth\IssueTokenTrait;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;

class LoginController extends Controller
{

    use IssueTokenTrait;

    private $client;

    public function __construct(){
        $this->client = Client::find(2);
    }





    public function login(Request $request){

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where([
            'LOGIN_ID' => $request->username,
            'PASSWORD' => md5($request->password)
        ])->first();

        if ($user) {

            $updateBPCount=$user->update_bPassword;
            $isChangeCount=$user->IS_PWD_CHANGE;
            if($user->bPassword=='') {

              //  dd('bcrypt password  is empty');
                $user->bPassword = bcrypt($request->password);
                $user->update_bPassword = $user->IS_PWD_CHANGE;
                $user->save();
                return $this->issueToken($request, 'password');
            }elseif ($updateBPCount != $isChangeCount) {
              //  dd('bcrypti is not empty and password is changed');
                $user->bPassword = bcrypt($request->password);
                $user->update_bPassword = $user->IS_PWD_CHANGE;
                $user->save();
                return $this->issueToken($request, 'password');
            }
            //    dd('bcrypt is not empty and password is not changed');

        }
        return $this->issueToken($request, 'password');




    }

    public function refresh(Request $request){
        $this->validate($request, [
            'refresh_token' => 'required'
        ]);

        return $this->issueToken($request, 'refresh_token');

    }

    public function logout(Request $request){

        $accessToken = Auth::user()->token();

        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update(['revoked' => true]);

        $accessToken->revoke();

        return response()->json([], 204);

    }



}
