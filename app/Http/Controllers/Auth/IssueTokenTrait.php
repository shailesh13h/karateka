<?php


namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

trait IssueTokenTrait{


    public function issueToken(Request  $request,$grantType,$scope="*"){

        $params = [
            'grant_type' => $grantType,
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'scope' => $scope
        ];

        if($grantType !== 'social'){
            $params['LOGIN_ID'] = $request->username ?: $request->email;
        }

        $request->request->add($params);
       // dd($request);
        $proxy = Request::create('oauth/token', 'POST');

        return Route::dispatch($proxy);
    }

}







?>