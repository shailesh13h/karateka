<?php

namespace App;

use App\Model\Karate_ka;
use App\Model\Renewal_dtl;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    use  HasApiTokens,Notifiable;

    protected $table = 'karate_ka_login';
    //oweride default primary  key

    protected $primaryKey = 'KARATE_KA_ID';
    protected $password ='bPassword';
    protected $username = 'LOGIN_ID';

    // alow filable property  it will used in while creating karateka
    // but we are commenting it cause in karatek app we are not going to edit or insert some
    //fields
    protected $fillable = [
        'KARATE_KA_ID',
        'LOGIN_ID',
        'MEMBER_CODE',
        'ENTDATE',
        'ACTIVATION',
        'IS_PWD_CHANGE'
    ];

    protected $hidden = [
        'bPassword', 'remember_token',
    ];

    //here we just ovveride authenticatesUser trait method and
    //set username as LOGIN_ID
    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    //  get user name from LOGIN_ID colunm as per application need
    public function username()
    {
        return 'LOGIN_ID';
    }

    //  get password from bPassword field as per aour application
    public function getAuthPassword()
    {
        return $this->bPassword;
    }


    //passport get authentication with custom column
    public function findForPassport($username) {
        return $this->where('LOGIN_ID', $username)->first();
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function renewal(){

        return $this->hasMany(Renewal_dtl::class);
    }


}
